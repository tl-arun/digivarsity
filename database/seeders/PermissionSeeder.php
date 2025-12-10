<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'Create Program', 'slug' => 'program.create'],
            ['name' => 'Edit Program', 'slug' => 'program.edit'],
            ['name' => 'Delete Program', 'slug' => 'program.delete'],
            ['name' => 'View Program', 'slug' => 'program.view'],
            ['name' => 'Manage Intent', 'slug' => 'intent.manage'],
            ['name' => 'Manage Outcome', 'slug' => 'outcome.manage'],
            ['name' => 'Manage University', 'slug' => 'university.manage'],
            ['name' => 'Manage Testimonial', 'slug' => 'testimonial.manage'],
            ['name' => 'View Lead', 'slug' => 'lead.view'],
            ['name' => 'Manage Lead', 'slug' => 'lead.manage'],
            ['name' => 'View Dashboard', 'slug' => 'dashboard.view'],
            ['name' => 'Manage User', 'slug' => 'user.manage'],
            ['name' => 'Manage Role', 'slug' => 'role.manage'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['slug' => $permission['slug']], $permission);
        }
    }
}
