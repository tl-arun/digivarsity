<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function all(): Collection
    {
        return User::with('roles')->get();
    }

    public function find(int $id): ?User
    {
        return User::with('roles')->find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return User::where('id', $id)->update($data);
    }

    public function assignRole(int $userId, int $roleId): void
    {
        $user = User::findOrFail($userId);
        $user->roles()->syncWithoutDetaching([$roleId]);
    }

    public function removeRole(int $userId, int $roleId): void
    {
        $user = User::findOrFail($userId);
        $user->roles()->detach($roleId);
    }
}
