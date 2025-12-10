<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Full system access',
            ],
            [
                'name' => 'Counselor',
                'slug' => 'counselor',
                'description' => 'Can view leads and programs',
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Basic user access',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['slug' => $role['slug']], $role);
        }
    }
}
