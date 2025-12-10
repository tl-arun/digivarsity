# Digivarsity Unified Education Platform - Installation Guide

## Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL 8.0 or higher
- Redis (for caching)
- Node.js & NPM (optional, for frontend assets)

## Installation Steps

### 1. Install Dependencies

```bash
composer install
```

### 2. Environment Configuration

The `.env` file is already configured. Verify these settings:

```env
APP_NAME="Digivarsity"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=digivarsity
DB_USERNAME=root
DB_PASSWORD=

CACHE_STORE=redis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
```

### 3. Create Database

```bash
mysql -u root -p
CREATE DATABASE digivarsity;
EXIT;
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Seed Database (RBAC + Admin Users)

```bash
php artisan db:seed
```

This will create:
- **Admin User**: admin@digivarsity.com / password
- **Counselor User**: counselor@digivarsity.com / password
- All roles and permissions

### 6. Install Sanctum (if not already installed)

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

### 7. Start Redis Server

```bash
redis-server
```

### 8. Start Development Server

```bash
php artisan serve
```

API will be available at: `http://localhost:8000/api/v1`

## Testing the API

### 1. Import Postman Collection

Import `Digivarsity_API_Collection.postman_collection.json` into Postman.

### 2. Login

```bash
POST http://localhost:8000/api/v1/auth/login
Content-Type: application/json

{
    "email": "admin@digivarsity.com",
    "password": "password"
}
```

Copy the token from response and use it in Authorization header:
```
Authorization: Bearer YOUR_TOKEN_HERE
```

### 3. Test Public Endpoints (No Auth Required)

- GET `/api/v1/programs`
- GET `/api/v1/intents`
- GET `/api/v1/outcomes`
- GET `/api/v1/universities`
- POST `/api/v1/leads`

### 4. Test Protected Endpoints (Auth Required)

- GET `/api/v1/auth/me`
- GET `/api/v1/admin/dashboard`
- GET `/api/v1/admin/leads`

### 5. Test Admin-Only Endpoints

- POST `/api/v1/admin/programs`
- POST `/api/v1/admin/intents`
- POST `/api/v1/admin/outcomes`
- POST `/api/v1/admin/universities`
- POST `/api/v1/admin/testimonials`
- POST `/api/v1/admin/users`

## Default Roles & Permissions

### Admin Role
- Full access to all endpoints
- Can manage users, roles, programs, intents, outcomes, universities, testimonials, leads

### Counselor Role
- Can view dashboard
- Can view and manage leads
- Can view programs

### User Role
- Can only view public endpoints

## API Response Format

All API responses follow this format:

```json
{
    "success": true,
    "message": "Success message",
    "data": {
        // Response data
    }
}
```

Error responses:

```json
{
    "success": false,
    "message": "Error message",
    "errors": {
        // Validation errors (if any)
    }
}
```

## Cache Management

Clear cache when needed:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

## Production Deployment

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Set up proper Redis configuration
7. Configure queue workers for background jobs
8. Set up SSL certificate
9. Configure CORS if needed

## Troubleshooting

### Redis Connection Error
- Ensure Redis is running: `redis-cli ping` (should return PONG)
- Check Redis configuration in `.env`

### Database Connection Error
- Verify MySQL is running
- Check database credentials in `.env`
- Ensure database exists

### Permission Denied Errors
- Run: `chmod -R 775 storage bootstrap/cache`
- Run: `chown -R www-data:www-data storage bootstrap/cache`

## Support

For issues or questions, contact the development team.
