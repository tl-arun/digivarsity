<?php

namespace App\Services;

use App\Repositories\TestimonialRepository;

class TestimonialService
{
    public function __construct(
        private TestimonialRepository $repository
    ) {}

    public function getAllTestimonials()
    {
        return $this->repository->getAll();
    }

    public function getTestimonialsByProgram(int $programId)
    {
        return $this->repository->getByProgram($programId);
    }

    public function createTestimonial(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateTestimonial(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteTestimonial(int $id)
    {
        return $this->repository->delete($id);
    }
}
