<?php

namespace App\Repositories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProgramRepository
{
    public function all(array $filters = [])
    {
        $query = Program::with(['university', 'intent', 'outcome']);

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['university_id'])) {
            $query->where('university_id', $filters['university_id']);
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        if (isset($filters['is_featured'])) {
            $query->where('is_featured', $filters['is_featured']);
        }

        // If limit is specified, return collection instead of paginated
        if (isset($filters['limit'])) {
            return $query->limit($filters['limit'])->get();
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    public function find(int $id): ?Program
    {
        return Program::with(['university', 'testimonials', 'intent', 'outcome'])->find($id);
    }

    public function create(array $data): Program
    {
        return Program::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Program::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Program::destroy($id) > 0;
    }


}
