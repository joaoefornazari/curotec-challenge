<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskService implements TaskServiceInterface {
    
    public function create(array $data): JsonResponse {
        Task::create($data);
        return response()->json(['message' => 'Task created successfully'], 201);
    }

    public function update(int $id, array $data): JsonResponse {
        $task = Task::findOrFail($id);
        $task->update($data);
        return response()->json(['message' => 'Task updated successfully'], 200);
    }

    public function getOne(int $id): JsonResponse {
        $task = Task::with(['project', 'category'])->findOrFail($id);
        return response()->json($task);
    }

    public function list(int $projectId): JsonResponse {
        $tasks = Task::with(['project', 'category'])
            ->where('project', $projectId)
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks found'], 404);
        }

        return response()->json($tasks);
    }

    public function delete(int $id): JsonResponse {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 204);
    }
}