#!/bin/sh
set -e

echo "🚀 Starting Digivarisity Application..."

# Navigate to application directory
cd /var/www/html

# Generate application key if not set
if grep -q "APP_KEY=base64:GENERATE_THIS_KEY_DURING_BUILD" .env 2>/dev/null || \
   ! grep -q "APP_KEY=" .env 2>/dev/null || \
   [ -z "$(grep APP_KEY= .env | cut -d '=' -f2)" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Wait for database to be ready with timeout
echo "⏳ Waiting for database connection..."
MAX_TRIES=60
COUNTER=0

while [ $COUNTER -lt $MAX_TRIES ]; do
    if php artisan migrate:status 2>/dev/null; then
        echo "✅ Database is ready!"
        break
    fi

    COUNTER=$((COUNTER + 1))
    echo "Database is unavailable - attempt $COUNTER/$MAX_TRIES (waiting 2s...)"
    sleep 2

    if [ $COUNTER -eq $MAX_TRIES ]; then
        echo "❌ Database connection timeout after $MAX_TRIES attempts"
        echo "Please check if MySQL container is running and healthy"
        exit 1
    fi
done

# Run migrations
echo "📊 Running database migrations..."
php artisan migrate --force

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link || echo "Storage link already exists"

# Clear and cache configuration
echo "🗄️ Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Set proper permissions
echo "🔐 Setting permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "✨ Application ready!"

# Execute the main command
exec "$@"

