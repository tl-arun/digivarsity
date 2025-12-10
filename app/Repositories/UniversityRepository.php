<?php

namespace App\Repositories;

use App\Models\University;
use Illuminate\Database\Eloquent\Collection;

class UniversityRepository
{
    public function all(): Collection
    {
        return University::where('is_active', true)->get();
    }

    public function find(int $id): ?University
    {
        return University::with('programs')->find($id);
    }

    public function create(array $data): University
    {
        return University::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return University::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return University::destroy($id) > 0;
    }
}
