#!/bin/bash
set -e

# Run default prestart (generates /nginx.conf from Nixpacks template)
node /assets/scripts/prestart.mjs /assets/nginx.template.conf /nginx.conf

# Fix: remove duplicate location / block caused by both
# IS_LARAVEL=yes AND NIXPACKS_PHP_FALLBACK_PATH=/index.php being set
awk '
BEGIN { dup = 0; skip = 0 }
/^    location \/ \{/ {
    if (dup++) { skip = 1 }
    if (!skip) print
    next
}
skip && /^    \}/ { skip = 0; next }
!skip { print }
' /nginx.conf > /tmp/nginx-fixed.conf && mv /tmp/nginx-fixed.conf /nginx.conf

# Start PHP-FPM in background
php-fpm -y /assets/php-fpm.conf &

# Start NGINX in foreground (keeps container alive)
exec nginx -c /nginx.conf
