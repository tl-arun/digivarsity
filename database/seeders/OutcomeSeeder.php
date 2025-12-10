<?php

namespace Database\Seeders;

use App\Models\Outcome;
use Illuminate\Database\Seeder;

class OutcomeSeeder extends Seeder
{
    public function run(): void
    {
        $outcomes = [
            [
                'name' => 'Leadership Role',
                'description' => 'Transition to C-suite or senior management positions.',
                'is_active' => true,
            ],
            [
                'name' => 'Salary Hike',
                'description' => 'Achieve 30-50% increase in compensation.',
                'is_active' => true,
            ],
            [
                'name' => 'Job Promotion',
                'description' => 'Move up the corporate ladder within your organization.',
                'is_active' => true,
            ],
            [
                'name' => 'Industry Switch',
                'description' => 'Successfully transition to a new industry or domain.',
                'is_active' => true,
            ],
            [
                'name' => 'Start Own Business',
                'description' => 'Launch and run a successful startup or business.',
                'is_active' => true,
            ],
            [
                'name' => 'International Opportunity',
                'description' => 'Secure positions in global companies or work abroad.',
                'is_active' => true,
            ],
            [
                'name' => 'Consulting Career',
                'description' => 'Join top consulting firms or become an independent consultant.',
                'is_active' => true,
            ],
        ];

        foreach ($outcomes as $outcome) {
            Outcome::firstOrCreate(
                ['name' => $outcome['name']],
                $outcome
            );
        }
    }
}
