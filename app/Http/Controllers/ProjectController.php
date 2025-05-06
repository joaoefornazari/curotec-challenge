<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\ProjectServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    protected ProjectServiceInterface $service = new ProjectServiceInterface();

    public function new(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:200',
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
                'name' => 'sometimes|required|string|max:200',
                'category' => 'sometimes|required|exists:categories,id'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode() ?? 500);
        }

        return $this->service->update($id, $validatedData);    
    }

    public function get(string $id): JsonResponse
    {
        return $this->service->getOne(intval($id));
    }

    public function getAll(Request $request): JsonResponse
    {
        $name = $request->query('name', null);

        return $this->service->list($name);
    }

    public function destroy($id): JsonResponse
    {
        return $this->service->delete(intval($id));
    }
}