<?php

namespace App\Http\Controllers;

use App\Http\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    protected TaskService $service;

    public function __construct() {
        $this->service = new TaskService();
    }

    public function new(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'description' => 'required|string',
                'project' => 'required|exists:projects,id',
                'category' => 'required|exists:categories,id'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode() ?? 500);
        }

        return $this->service->create($validatedData);
    }

    public function edit(Request $request, $id): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'description' => 'sometimes|required|string',
                'project' => 'sometimes|required|exists:projects,id',
                'category' => 'sometimes|required|exists:categories,id'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode() ?? 500);
        }

        return $this->service->update($id, $validatedData);    
    }

    public function get(string $id): JsonResponse
    {
        return $this->service->getOne(id: intval($id));
    }

    public function getAll(Request $request): JsonResponse
    {
        return $this->service->list(intval($request->param('project')));
    }

    public function destroy($id): JsonResponse
    {
        return $this->service->delete(intval($id));
    }
}