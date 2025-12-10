<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Universities in Database ===\n\n";

$universities = DB::table('universities')
    ->select('id', 'name', 'logo', 'is_active')
    ->get();

if ($universities->isEmpty()) {
    echo "No universities found in database.\n";
    echo "Run: php artisan db:seed --class=UniversityImagesSeeder\n";
} else {
    echo "Total Universities: " . $universities->count() . "\n\n";

    foreach ($universities as $uni) {
        echo "ID: {$uni->id}\n";
        echo "Name: {$uni->name}\n";
        echo "Logo: " . ($uni->logo ? "✓ Yes" : "✗ No") . "\n";
        echo "Active: " . ($uni->is_active ? "✓ Yes" : "✗ No") . "\n";
        if ($uni->logo) {
            echo "Logo URL: {$uni->logo}\n";
        }
        echo "---\n";
    }
}

echo "\n=== Summary ===\n";
echo "Universities with logos: " . $universities->where('logo', '!=', null)->count() . "\n";
echo "Active universities: " . $universities->where('is_active', 1)->count() . "\n";
