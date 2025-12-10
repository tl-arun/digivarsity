<?php

namespace Database\Seeders;

use App\Models\Intent;
use Illuminate\Database\Seeder;

class IntentSeeder extends Seeder
{
    public function run(): void
    {
        $intents = [
            [
                'name' => 'Career Advancement',
                'description' => 'Advance to senior leadership positions and take your career to the next level.',
                'is_active' => true,
            ],
            [
                'name' => 'Skill Development',
                'description' => 'Acquire new skills and competencies to stay relevant in the job market.',
                'is_active' => true,
            ],
            [
                'name' => 'Career Switch',
                'description' => 'Transition to a new industry or role with confidence and expertise.',
                'is_active' => true,
            ],
            [
                'name' => 'Entrepreneurship',
                'description' => 'Learn to start and manage your own business successfully.',
                'is_active' => true,
            ],
            [
                'name' => 'Salary Increase',
                'description' => 'Enhance your earning potential with advanced qualifications.',
                'is_active' => true,
            ],
            [
                'name' => 'Network Building',
                'description' => 'Connect with industry leaders and build valuable professional relationships.',
                'is_active' => true,
            ],
            [
                'name' => 'Global Exposure',
                'description' => 'Gain international perspective and work opportunities.',
                'is_active' => true,
            ],
        ];

        foreach ($intents as $intent) {
            Intent::firstOrCreate(
                ['name' => $intent['name']],
                $intent
            );
        }
    }
}
