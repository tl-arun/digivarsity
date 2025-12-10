<?php

namespace App\Services;

use App\Repositories\IntentRepository;
use Illuminate\Support\Facades\Cache;

class IntentService
{
    public function __construct(
        private IntentRepository $repository
    ) {}

    public function getAllIntents()
    {
        return Cache::remember('intents_all', 3600, function () {
            return $this->repository->all();
        });
    }

    public function getIntent(int $id)
    {
        return $this->repository->find($id);
    }

    public function createIntent(array $data)
    {
        $intent = $this->repository->create($data);
        Cache::forget('intents_all');
        return $intent;
    }

    public function updateIntent(int $id, array $data)
    {
        $result = $this->repository->update($id, $data);
        Cache::forget('intents_all');
        return $result;
    }

    public function deleteIntent(int $id)
    {
        $result = $this->repository->delete($id);
        Cache::forget('intents_all');
        return $result;
    }

    public function getProgramsByIntent(int $intentId)
    {
        return Cache::remember("intent_{$intentId}_programs", 3600, function () use ($intentId) {
            return $this->repository->getProgramsByIntent($intentId);
        });
    }
}
