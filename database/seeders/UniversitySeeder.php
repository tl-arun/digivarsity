<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $universities = [
            [
                'name' => 'Harvard University',
                'description' => 'One of the most prestigious universities in the world, known for excellence in education and research.',
                'location' => 'Cambridge, Massachusetts, USA',
                'website' => 'https://www.harvard.edu',
                'is_active' => true,
            ],
            [
                'name' => 'Stanford University',
                'description' => 'A leading research university known for its entrepreneurial spirit and innovation.',
                'location' => 'Stanford, California, USA',
                'website' => 'https://www.stanford.edu',
                'is_active' => true,
            ],
            [
                'name' => 'MIT',
                'description' => 'Massachusetts Institute of Technology - World leader in science and technology education.',
                'location' => 'Cambridge, Massachusetts, USA',
                'website' => 'https://www.mit.edu',
                'is_active' => true,
            ],
            [
                'name' => 'Oxford University',
                'description' => 'The oldest university in the English-speaking world with a rich history of academic excellence.',
                'location' => 'Oxford, United Kingdom',
                'website' => 'https://www.ox.ac.uk',
                'is_active' => true,
            ],
            [
                'name' => 'Cambridge University',
                'description' => 'One of the world\'s oldest and most prestigious universities.',
                'location' => 'Cambridge, United Kingdom',
                'website' => 'https://www.cam.ac.uk',
                'is_active' => true,
            ],
            [
                'name' => 'IIM Bangalore',
                'description' => 'Premier management institute in India offering world-class MBA programs.',
                'location' => 'Bangalore, Karnataka, India',
                'website' => 'https://www.iimb.ac.in',
                'is_active' => true,
            ],
            [
                'name' => 'IIT Delhi',
                'description' => 'Leading technical institute in India known for engineering and technology programs.',
                'location' => 'New Delhi, India',
                'website' => 'https://www.iitd.ac.in',
                'is_active' => true,
            ],
            [
                'name' => 'XLRI Jamshedpur',
                'description' => 'Top business school in India specializing in HR and management education.',
                'location' => 'Jamshedpur, Jharkhand, India',
                'website' => 'https://www.xlri.ac.in',
                'is_active' => true,
            ],
        ];

        foreach ($universities as $university) {
            University::firstOrCreate(
                ['name' => $university['name']],
                $university
            );
        }
    }
}
