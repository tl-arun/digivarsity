<?php

namespace App\Services;

use App\Repositories\OutcomeRepository;
use Illuminate\Support\Facades\Cache;

class OutcomeService
{
    public function __construct(
        private OutcomeRepository $repository
    ) {}

    public function getAllOutcomes()
    {
        return Cache::remember('outcomes_all', 3600, function () {
            return $this->repository->all();
        });
    }

    public function getOutcome(int $id)
    {
        return $this->repository->find($id);
    }

    public function createOutcome(array $data)
    {
        $outcome = $this->repository->create($data);
        Cache::forget('outcomes_all');
        return $outcome;
    }

    public function updateOutcome(int $id, array $data)
    {
        $result = $this->repository->update($id, $data);
        Cache::forget('outcomes_all');
        return $result;
    }

    public function deleteOutcome(int $id)
    {
        $result = $this->repository->delete($id);
        Cache::forget('outcomes_all');
        return $result;
    }

    public function getProgramsByOutcome(int $outcomeId)
    {
        return Cache::remember("outcome_{$outcomeId}_programs", 3600, function () use ($outcomeId) {
            return $this->repository->getProgramsByOutcome($outcomeId);
        });
    }
}
