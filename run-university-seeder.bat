@echo off
echo Running University Images Seeder...
php artisan db:seed --class=UniversityImagesSeeder
echo.
echo University images have been added to the database!
echo.
pause
