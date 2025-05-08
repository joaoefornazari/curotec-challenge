<?php

namespace App\Http\Services\Interfaces;

use Illuminate\Http\JsonResponse;

interface ProjectServiceInterface
{
    public function create(array $data): JsonResponse;
    public function update(int $id, array $data): JsonResponse;
    public function getOne(int $id): JsonResponse;
    /**
    * Fetch projects from the database; can filter by name if provided.
     * @param ?string $name
     * @return JsonResponse
     */
    public function list(?string $name): JsonResponse;
    public function delete(int $id): JsonResponse;
}
