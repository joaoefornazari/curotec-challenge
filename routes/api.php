<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Project routes
Route::prefix('/projects')->group(function () {
    Route::post('/', [ProjectController::class, 'new']);

    Route::put('/{id}', [ProjectController::class, 'edit']);
    
    Route::get('/', [ProjectController::class, 'getAll']);
    Route::get('/{id}', [ProjectController::class, 'get']);
    
    Route::delete('/{id}', [ProjectController::class, 'destroy']);
});

// Task routes
Route::prefix('/tasks')->group(function () {
    Route::post('/', [TaskController::class, 'new']);
    
    Route::put('/{id}', [TaskController::class, 'edit']);
    
    Route::get('/{project}', [TaskController::class, 'getAll']);
    Route::get('/{id}', [TaskController::class, 'get']);

    Route::delete('/{id}', [TaskController::class, 'destroy']);
});


// Category routes
Route::prefix('/categories')->group(function () {
    Route::post('/', [CategoryController::class, 'new']);

    Route::put('/{id}', [CategoryController::class, 'edit']);
    
    Route::get('/{id}', [CategoryController::class, 'get']);
    Route::get('/', [CategoryController::class, 'getAll']);

    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
