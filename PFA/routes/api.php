<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MissionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User routes
Route::get('/users', [UserController::class, 'getUser']);
Route::get('/users/{id}', [UserController::class, 'getUserById']);
Route::post('/addUser', [UserController::class, 'addUser']);
Route::put('/updateUser/{id}', [UserController::class, 'updateUser']);
Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser']);

// Mission routes
Route::get('/missions', [MissionController::class, 'getMission']);
Route::get('/missions/{id}', [MissionController::class, 'getMissionById']);
Route::post('/addMission', [MissionController::class, 'addMission']);
Route::put('/updateMission/{id}', [MissionController::class, 'updateMission']);
Route::delete('/deleteMission/{id}', [MissionController::class, 'deleteMission']);
