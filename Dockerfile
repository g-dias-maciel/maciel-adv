# Stage 1: Build frontend assets (Vite + Tailwind + Fonts)
FROM node:22-alpine AS build
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: PHP runtime with mysqlnd (supports caching_sha2_password)
FROM php:8.4-fpm-alpine

# Install system dependencies + nginx
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    && docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application
WORKDIR /app
COPY . .

# Copy pre-built frontend assets from build stage
COPY --from=build /app/public/build /app/public/build

# Install PHP dependencies (production only)
RUN composer install --no-dev --no-interaction --no-progress

# Storage permissions (PHP-FPM runs as www-data)
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Remove build-only files
RUN rm -rf node_modules .env package.json package-lock.json vite.config.js

# Configure Nginx
RUN echo 'server {
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
}' > /etc/nginx/http.d/default.conf

# Configure Supervisor (runs both PHP-FPM and Nginx)
RUN echo '[supervisord]
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
' > /etc/supervisord.conf

EXPOSE 80

CMD ["supervisord", "-c", "/etc/supervisord.conf"]
