<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::where('slug', 'admin')->first();
        $counselor = Role::where('slug', 'counselor')->first();
        $user = Role::where('slug', 'user')->first();

        // Admin gets all permissions
        $allPermissions = Permission::all();
        $admin->permissions()->sync($allPermissions->pluck('id'));

        // Counselor permissions
        $counselorPermissions = Permission::whereIn('slug', [
            'program.view',
            'lead.view',
            'lead.manage',
            'dashboard.view',
        ])->pluck('id');
        $counselor->permissions()->sync($counselorPermissions);

        // User permissions (public access only)
        $userPermissions = Permission::whereIn('slug', [
            'program.view',
        ])->pluck('id');
        $user->permissions()->sync($userPermissions);
    }
}
