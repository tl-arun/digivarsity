<?php

namespace App\Services;

use App\Repositories\LeadRepository;

class LeadService
{
    public function __construct(
        private LeadRepository $repository
    ) {}

    public function getAllLeads(array $filters = [])
    {
        return $this->repository->all($filters);
    }

    public function createLead(array $data)
    {
        return $this->repository->create($data);
    }

    public function getDashboardStats()
    {
        return $this->repository->getDashboardStats();
    }
}
