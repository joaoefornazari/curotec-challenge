<?php

namespace App\Http\Services\Interfaces;

use Illuminate\Http\JsonResponse;

interface TaskServiceInterface
{
    public function create(array $data): JsonResponse;
    public function update(int $id, array $data): JsonResponse;
    public function getOne(int $id): JsonResponse;
    /**
     * Fetch tasks from the database filtered by project ID.
     * @param int $projectId
     * @return JsonResponse
     */
    public function list(int $projectId): JsonResponse;
    public function delete(int $id): JsonResponse;
}