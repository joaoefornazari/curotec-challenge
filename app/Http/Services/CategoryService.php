<?php

namespace App\Http\Services;

use app\Http\Services\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryService implements CategoryServiceInterface {

    public function create(array $data): JsonResponse {
        Category::create($data);
        return response()->json(['message' => 'Category created successfully'], 201);
    }

    public function update(int $id, array $data): JsonResponse {
        $category = Category::findOrFail($id);
        $category->update($data);
        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    public function getOne(int $id): JsonResponse {
        $category = Category::with(['projects', 'tasks'])->findOrFail($id);
        return response()->json($category);
    }

    public function list(?string $name): JsonResponse {
        if ($name) {
            $categories = Category::where('name', 'like', "%$name%")->get();
        } else {
            $categories = Category::all();
        }

        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No categories found'], 404);
        }

        return response()->json($categories);
    }

    public function delete(int $id): JsonResponse {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 204);
    }
}