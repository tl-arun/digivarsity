<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@digivarsity.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'is_active' => true,
            ]
        );

        $adminRole = Role::where('slug', 'admin')->first();
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        $counselor = User::firstOrCreate(
            ['email' => 'counselor@digivarsity.com'],
            [
                'name' => 'Counselor User',
                'password' => Hash::make('password'),
                'phone' => '0987654321',
                'is_active' => true,
            ]
        );

        $counselorRole = Role::where('slug', 'counselor')->first();
        $counselor->roles()->syncWithoutDetaching([$counselorRole->id]);
    }
}
