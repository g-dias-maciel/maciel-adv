# Stage 1: Build frontend assets
FROM node:22-alpine AS build
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: PHP runtime
FROM php:8.4-fpm-alpine

# Install deps
RUN apk add --no-cache nginx supervisor curl \
    && docker-php-ext-install pdo_mysql

# PHP-FPM: allow env vars to reach workers (critical for Laravel)
RUN sed -i 's/^clear_env = yes/clear_env = no/' /usr/local/etc/php-fpm.d/www.conf

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# App
WORKDIR /app
COPY . .

# Build assets from stage 1
COPY --from=build /app/public/build /app/public/build

# Create Laravel cache directories (required for artisan commands)
RUN mkdir -p bootstrap/cache storage/framework/cache/data storage/framework/sessions storage/framework/views

# Prod deps
RUN composer install --no-dev --no-interaction --no-progress

# Permissions
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Cleanup
RUN rm -rf node_modules package.json package-lock.json vite.config.js

# Entrypoint: generate .env from runtime environment variables
RUN cat > /entrypoint.sh <<'ENTRYPOINT'
#!/bin/sh
# Generate .env from runtime environment variables for Laravel
: > /app/.env
env | while IFS='=' read -r key value; do
    case "$key" in
        APP_*|ASSET_URL|DB_*|SESSION_*|BROADCAST_*|FILESYSTEM_*|QUEUE_*|CACHE_*|MAIL_*|LOG_*|BCRYPT_*)
            printf '%s="%s"\n' "$key" "$value" >> /app/.env
            ;;
    esac
done
exec "$@"
ENTRYPOINT
RUN chmod +x /entrypoint.sh

# Nginx config
RUN cat > /etc/nginx/http.d/default.conf <<'NGINX'
server {
    listen 80;
    root /app/public;
    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
NGINX

# Supervisor config
RUN cat > /etc/supervisord.conf <<'SUPERVISOR'
[supervisord]
nodaemon=true
user=root
logfile=/dev/null
logfile_maxbytes=0

[program:php-fpm]
command=php-fpm -F
autostart=true
autorestart=true
stdout_logfile=/dev/stdout
stdout_logfile_maxbytes=0
stderr_logfile=/dev/stderr
stderr_logfile_maxbytes=0

[program:nginx]
command=nginx -g "daemon off;"
autostart=true
autorestart=true
stdout_logfile=/dev/stdout
stdout_logfile_maxbytes=0
stderr_logfile=/dev/stderr
stderr_logfile_maxbytes=0
SUPERVISOR

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
