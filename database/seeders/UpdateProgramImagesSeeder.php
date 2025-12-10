<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProgramImagesSeeder extends Seeder
{
    public function run(): void
    {
        $programImages = [
            1 => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80', // Digital Marketing
            2 => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&q=80', // Executive MBA
            3 => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80', // Data Science
            4 => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800&q=80', // Finance
            5 => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=800&q=80', // HR Management
            6 => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&q=80', // MCA
            7 => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&q=80', // Operations
            8 => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80', // Business Analytics
            9 => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&q=80', // Healthcare
            10 => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&q=80', // Project Management
        ];

        foreach ($programImages as $id => $imageUrl) {
            DB::table('programs')
                ->where('id', $id)
                ->update(['image_url' => $imageUrl]);
        }

        $this->command->info('Updated ' . count($programImages) . ' programs with images');
    }
}
