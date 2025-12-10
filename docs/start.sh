#!/bin/sh

# Start PHP-FPM in the background
echo "Starting PHP-FPM..."
php-fpm -D

# Run Laravel scheduler in the background
echo "Starting Laravel Scheduler..."
php artisan schedule:work &

# Start Nginx in the foreground
echo "Starting Nginx..."
nginx -g "daemon off;"
