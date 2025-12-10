<?php

namespace App\Repositories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;

class TestimonialRepository
{
    public function getAll(): Collection
    {
        return Testimonial::with('program')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getByProgram(int $programId): Collection
    {
        return Testimonial::where('program_id', $programId)
            ->where('is_active', true)
            ->get();
    }

    public function find(int $id): ?Testimonial
    {
        return Testimonial::with('program')->find($id);
    }

    public function create(array $data): Testimonial
    {
        return Testimonial::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Testimonial::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Testimonial::destroy($id) > 0;
    }
}
