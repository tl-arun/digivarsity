<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversityImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            [
                'name' => 'Oxford University',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Oxford-University-Circlet.svg/300px-Oxford-University-Circlet.svg.png',
                'description' => 'The University of Oxford is a collegiate research university in Oxford, England.',
                'location' => 'Oxford, United Kingdom',
                'website' => 'https://www.ox.ac.uk',
            ],
            [
                'name' => 'Harvard University',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/2/29/Harvard_shield_wreath.svg/300px-Harvard_shield_wreath.svg.png',
                'description' => 'Harvard University is a private Ivy League research university in Cambridge, Massachusetts.',
                'location' => 'Cambridge, Massachusetts, USA',
                'website' => 'https://www.harvard.edu',
            ],
            [
                'name' => 'Stanford University',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Seal_of_Leland_Stanford_Junior_University.svg/300px-Seal_of_Leland_Stanford_Junior_University.svg.png',
                'description' => 'Stanford University is a private research university in Stanford, California.',
                'location' => 'Stanford, California, USA',
                'website' => 'https://www.stanford.edu',
            ],
            [
                'name' => 'MIT',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MIT_logo.svg/300px-MIT_logo.svg.png',
                'description' => 'Massachusetts Institute of Technology is a private research university in Cambridge, Massachusetts.',
                'location' => 'Cambridge, Massachusetts, USA',
                'website' => 'https://www.mit.edu',
            ],
            [
                'name' => 'Cambridge University',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Coat_of_Arms_of_the_University_of_Cambridge.svg/300px-Coat_of_Arms_of_the_University_of_Cambridge.svg.png',
                'description' => 'The University of Cambridge is a collegiate research university in Cambridge, United Kingdom.',
                'location' => 'Cambridge, United Kingdom',
                'website' => 'https://www.cam.ac.uk',
            ],
            [
                'name' => 'IIT Delhi',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fd/Indian_Institute_of_Technology_Delhi_Logo.svg/300px-Indian_Institute_of_Technology_Delhi_Logo.svg.png',
                'description' => 'Indian Institute of Technology Delhi is a public technical university located in New Delhi, India.',
                'location' => 'New Delhi, India',
                'website' => 'https://home.iitd.ac.in',
            ],
            [
                'name' => 'IIM Ahmedabad',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f5/Indian_Institute_of_Management_Ahmedabad_Logo.svg/300px-Indian_Institute_of_Management_Ahmedabad_Logo.svg.png',
                'description' => 'Indian Institute of Management Ahmedabad is a public business school located in Ahmedabad, Gujarat, India.',
                'location' => 'Ahmedabad, Gujarat, India',
                'website' => 'https://www.iima.ac.in',
            ],
            [
                'name' => 'University of Delhi',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4b/University_of_Delhi.svg/300px-University_of_Delhi.svg.png',
                'description' => 'University of Delhi is a collegiate central university located in New Delhi, India.',
                'location' => 'New Delhi, India',
                'website' => 'http://www.du.ac.in',
            ],
            [
                'name' => 'BITS Pilani',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d3/BITS_Pilani-Logo.svg/300px-BITS_Pilani-Logo.svg.png',
                'description' => 'Birla Institute of Technology and Science, Pilani is a deemed university in Pilani, Rajasthan, India.',
                'location' => 'Pilani, Rajasthan, India',
                'website' => 'https://www.bits-pilani.ac.in',
            ],
            [
                'name' => 'Manipal University',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/94/Manipal_Academy_of_Higher_Education_logo.png/300px-Manipal_Academy_of_Higher_Education_logo.png',
                'description' => 'Manipal Academy of Higher Education is a private deemed university in Manipal, Karnataka, India.',
                'location' => 'Manipal, Karnataka, India',
                'website' => 'https://www.manipal.edu',
            ],
        ];

        foreach ($universities as $university) {
            // Check if university already exists
            $exists = DB::table('universities')
                ->where('name', $university['name'])
                ->exists();

            if (!$exists) {
                DB::table('universities')->insert([
                    'name' => $university['name'],
                    'logo' => $university['logo'],
                    'description' => $university['description'],
                    'location' => $university['location'],
                    'website' => $university['website'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Update existing university with logo
                DB::table('universities')
                    ->where('name', $university['name'])
                    ->update([
                        'logo' => $university['logo'],
                        'description' => $university['description'],
                        'location' => $university['location'],
                        'website' => $university['website'],
                        'updated_at' => now(),
                    ]);
            }
        }

        $this->command->info('Universities with images seeded successfully!');
    }
}
