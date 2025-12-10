<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\University;
use Illuminate\Database\Seeder;

class UpdateImagesSeeder extends Seeder
{
    public function run(): void
    {
        // Update Programs with images
        $programImages = [
            'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop', // Digital Marketing
            'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=600&fit=crop', // Executive MBA
            'https://images.unsplash.com/photo-1551434678-e076c223a692?w=800&h=600&fit=crop', // Data Science
            'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=600&fit=crop', // Finance
            'https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=800&h=600&fit=crop', // HR
            'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&h=600&fit=crop', // MCA
            'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=600&fit=crop', // Operations
            'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&h=600&fit=crop', // Analytics
            'https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=800&h=600&fit=crop', // Healthcare
            'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&h=600&fit=crop', // Project Management
        ];

        $programs = Program::all();
        foreach ($programs as $index => $program) {
            $program->update([
                'image' => $programImages[$index % count($programImages)]
            ]);
        }

        // Update Universities with images
        $universityImages = [
            'https://images.unsplash.com/photo-1562774053-701939374585?w=800&h=600&fit=crop', // Harvard
            'https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?w=800&h=600&fit=crop', // Stanford
            'https://images.unsplash.com/photo-1564981797816-1043664bf78d?w=800&h=600&fit=crop', // MIT
            'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&h=600&fit=crop', // Oxford
            'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop', // Cambridge
            'https://images.unsplash.com/photo-1607237138185-eedd9c632b0b?w=800&h=600&fit=crop', // IIM
            'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=800&h=600&fit=crop', // IIT
            'https://images.unsplash.com/photo-1576495199011-eb94736d05d6?w=800&h=600&fit=crop', // XLRI
        ];

        $universities = University::all();
        foreach ($universities as $index => $university) {
            $university->update([
                'image' => $universityImages[$index % count($universityImages)]
            ]);
        }

        $this->command->info('Updated ' . $programs->count() . ' programs and ' . $universities->count() . ' universities with images!');
    }
}
