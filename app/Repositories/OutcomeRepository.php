<?php

namespace App\Repositories;

use App\Models\Outcome;
use Illuminate\Database\Eloquent\Collection;

class OutcomeRepository
{
    public function all(): Collection
    {
        return Outcome::where('is_active', true)->get();
    }

    public function find(int $id): ?Outcome
    {
        return Outcome::with('programs')->find($id);
    }

    public function create(array $data): Outcome
    {
        return Outcome::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Outcome::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Outcome::destroy($id) > 0;
    }

    public function getProgramsByOutcome(int $outcomeId)
    {
        $outcome = Outcome::with('programs.university')->findOrFail($outcomeId);
        return $outcome->programs;
    }
}
