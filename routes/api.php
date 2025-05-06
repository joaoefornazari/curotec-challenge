<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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
Route::post('/projects', [ProjectController::class, 'new']);
Route::put('/projects/{id}', [ProjectController::class, 'edit']);
Route::get('/projects/{id}', [ProjectController::class, 'get']);
Route::get('/projects', [ProjectController::class, 'getAll']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
