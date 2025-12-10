<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Intent;
use App\Models\Outcome;
use App\Models\Program;
use App\Services\LeadService;

class DashboardController extends Controller
{
    public function __construct(
        private LeadService $leadService
    ) {}

    public function index()
    {
        $leadStats = $this->leadService->getDashboardStats();

        $data = [
            'total_programs' => Program::count(),
            'total_intents' => Intent::count(),
            'total_outcomes' => Outcome::count(),
            'total_leads' => $leadStats['total_leads'],
            'leads_per_program' => $leadStats['leads_per_program'],
            'leads_per_intent' => $leadStats['leads_per_intent'],
            'leads_per_outcome' => $leadStats['leads_per_outcome'],
            'leads_by_status' => $leadStats['leads_by_status'],
        ];

        return ApiResponse::success($data, 'Dashboard data retrieved successfully');
    }
}
