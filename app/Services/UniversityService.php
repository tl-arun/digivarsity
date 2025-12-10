<?php

namespace App\Services;

use App\Repositories\UniversityRepository;
use Illuminate\Support\Facades\Cache;

class UniversityService
{
    public function __construct(
        private UniversityRepository $repository
    ) {}

    public function getAllUniversities()
    {
        return Cache::remember('universities_all', 3600, function () {
            return $this->repository->all();
        });
    }

    public function getUniversity(int $id)
    {
        return $this->repository->find($id);
    }

    public function createUniversity(array $data)
    {
        $university = $this->repository->create($data);
        Cache::forget('universities_all');
        return $university;
    }

    public function updateUniversity(int $id, array $data)
    {
        $result = $this->repository->update($id, $data);
        Cache::forget('universities_all');
        return $result;
    }

    public function deleteUniversity(int $id)
    {
        $result = $this->repository->delete($id);
        Cache::forget('universities_all');
        return $result;
    }
}
