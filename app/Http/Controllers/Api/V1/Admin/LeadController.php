<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeadResource;
use App\Services\LeadService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function __construct(
        private LeadService $service
    ) {}

    public function index(Request $request)
    {
        $filters = $request->only(['status', 'program_id', 'per_page']);
        $leads = $this->service->getAllLeads($filters);

        return ApiResponse::success(
            LeadResource::collection($leads)->response()->getData(true),
            'Leads retrieved successfully'
        );
    }
}
