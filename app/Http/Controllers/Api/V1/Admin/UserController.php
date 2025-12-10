<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssignRoleRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        private UserService $service
    ) {}

    public function store(StoreUserRequest $request)
    {
        $user = $this->service->createUser($request->validated());

        return ApiResponse::success(
            new UserResource($user),
            'User created successfully',
            201
        );
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $this->service->updateUser($id, $request->validated());

        return ApiResponse::success(null, 'User updated successfully');
    }

    public function assignRole(AssignRoleRequest $request, int $id)
    {
        $this->service->assignRole($id, $request->input('role_id'));

        return ApiResponse::success(null, 'Role assigned successfully');
    }
}
