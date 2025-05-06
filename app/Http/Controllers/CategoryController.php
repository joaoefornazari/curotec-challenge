<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    protected CategoryServiceInterface $service;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->service = $categoryService;
    }

    public function new(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:200'
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
                'name' => 'required|string|max:200'
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