<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\ProjectServiceInterface;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectService implements ProjectServiceInterface {

    public function create(array $data): JsonResponse {
        Project::create($data);
        return response()->json(['message' => 'Project created succesfully'], 201);
    }

    public function update(int $id, array $data): JsonResponse {
        $project = Project::findOrFail($id);
        $project->update($data);
        return response()->json(['message' => 'Project updated successfully'], 200);
    }

    public function getOne(int $id): JsonResponse {
        $project = Project::with('category')->findOrFail($id);
        return response()->json($project);
    }

    public function list(?string $name): JsonResponse {

        if ($name) {
            $projects = Project::with('category')
                ->where('name', 'like', "%$name%")
                ->get();
        } else {
            $projects = Project::with('category')->get();
        }

        if ($projects->isEmpty()) {
            return response()->json(['message' => 'No projects found'], 404);
        }

        return response()->json($projects);
    }

    public function delete(int $id): JsonResponse {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully'], 204);
    }
}