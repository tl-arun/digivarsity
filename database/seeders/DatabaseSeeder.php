<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // RBAC System
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            AdminUserSeeder::class,

            // Master Data
            UniversitySeeder::class,
            IntentSeeder::class,
            OutcomeSeeder::class,

            // Programs
            ProgramSeeder::class,

            // Testimonials & Leads
            TestimonialSeeder::class,
            LeadSeeder::class,
        ]);
    }
}
