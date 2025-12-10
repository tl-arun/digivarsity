<?php

namespace App\Repositories;

use App\Models\Intent;
use Illuminate\Database\Eloquent\Collection;

class IntentRepository
{
    public function all(): Collection
    {
        return Intent::where('is_active', true)->get();
    }

    public function find(int $id): ?Intent
    {
        return Intent::with('programs')->find($id);
    }

    public function create(array $data): Intent
    {
        return Intent::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Intent::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Intent::destroy($id) > 0;
    }

    public function getProgramsByIntent(int $intentId)
    {
        $intent = Intent::with('programs.university')->findOrFail($intentId);
        return $intent->programs;
    }
}
