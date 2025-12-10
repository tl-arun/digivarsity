<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroBackgroundsSeeder extends Seeder
{
    public function run(): void
    {
        $backgrounds = [
            [
                'image_url' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80',
                'image_type' => 'url',
                'order' => 1,
                'is_active' => true,
                'animation_type' => 'fade',
                'animation_duration' => 5000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1920&q=80',
                'image_type' => 'url',
                'order' => 2,
                'is_active' => true,
                'animation_type' => 'fade',
                'animation_duration' => 5000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&q=80',
                'image_type' => 'url',
                'order' => 3,
                'is_active' => true,
                'animation_type' => 'fade',
                'animation_duration' => 5000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('hero_backgrounds')->insert($backgrounds);

        $this->command->info('Hero backgrounds seeded successfully!');
    }
}
