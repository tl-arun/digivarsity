<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Resources\LeadResource;
use App\Services\LeadService;

class LeadController extends Controller
{
    public function __construct(
        private LeadService $service
    ) {}

    public function store(StoreLeadRequest $request)
    {
        $lead = $this->service->createLead($request->validated());

        return ApiResponse::success(
            new LeadResource($lead),
            'Lead submitted successfully',
            201
        );
    }
}
