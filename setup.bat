@echo off
echo ========================================
echo Digivarsity Platform Setup
echo ========================================
echo.

echo [1/7] Installing Composer dependencies...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Composer install failed
    pause
    exit /b 1
)
echo.

echo [2/7] Installing Laravel Sanctum...
call composer require laravel/sanctum
echo.

echo [3/7] Publishing Sanctum configuration...
call php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
echo.

echo [4/7] Running database migrations...
call php artisan migrate
if %errorlevel% neq 0 (
    echo ERROR: Migration failed. Please check your database configuration in .env
    pause
    exit /b 1
)
echo.

echo [5/7] Seeding database with roles, permissions, and admin users...
call php artisan db:seed
echo.

echo [6/7] Clearing caches...
call php artisan cache:clear
call php artisan config:clear
call php artisan route:clear
echo.

echo [7/7] Setup complete!
echo.
echo ========================================
echo Default Admin Credentials:
echo Email: admin@digivarsity.com
echo Password: password
echo ========================================
echo.
echo Default Counselor Credentials:
echo Email: counselor@digivarsity.com
echo Password: password
echo ========================================
echo.
echo To start the development server, run:
echo php artisan serve
echo.
echo API will be available at:
echo http://localhost:8000/api/v1
echo.
echo Import the Postman collection to test:
echo Digivarsity_API_Collection.postman_collection.json
echo.
pause
