<?php

namespace App\Repositories;

use App\Models\Lead;
use Illuminate\Pagination\LengthAwarePaginator;

class LeadRepository
{
    public function all(array $filters = []): LengthAwarePaginator
    {
        $query = Lead::with(['program', 'intent', 'outcome']);

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['program_id'])) {
            $query->where('program_id', $filters['program_id']);
        }

        return $query->latest()->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Lead
    {
        return Lead::create($data);
    }

    public function find(int $id): ?Lead
    {
        return Lead::with(['program', 'intent', 'outcome'])->find($id);
    }

    public function getDashboardStats(): array
    {
        return [
            'total_leads' => Lead::count(),
            'leads_per_program' => Lead::selectRaw('program_id, COUNT(*) as count')
                ->groupBy('program_id')
                ->with('program:id,name')
                ->get(),
            'leads_per_intent' => Lead::selectRaw('intent_id, COUNT(*) as count')
                ->groupBy('intent_id')
                ->with('intent:id,name')
                ->get(),
            'leads_per_outcome' => Lead::selectRaw('outcome_id, COUNT(*) as count')
                ->groupBy('outcome_id')
                ->with('outcome:id,name')
                ->get(),
            'leads_by_status' => Lead::selectRaw('status, COUNT(*) as count')
                ->groupBy('status')
                ->get(),
        ];
    }
}
