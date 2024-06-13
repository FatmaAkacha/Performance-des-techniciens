<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MissionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route pour obtenir tous les utilisateurs (API)
Route::get('/users', [UserController::class, 'getUser']);

// Route pour obtenir un utilisateur spécifique (API)
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/{id}', [UserController::class, 'getUserById']);
Route::post('/addUser', [UserController::class,'addUser']);
Route::put('/updateUser/{id}', [UserController::class,'updateUser']);
Route::delete('/deleteUser/{id}', [UserController::class,'deleteUser']);
// Route pour obtenir les missions (API)
Route::get('/missions', [MissionController::class, 'getMission']);
// Route pour obtenir un mission (API)
Route::get('/missions/{mission}', [UserController::class, 'show']);
Route::get('/missions/{id}', [UserController::class, 'getMissionById']);
Route::post('/addMission', [UserController::class,'addUser']);
Route::put('/updateMission/{id}', [UserController::class,'updateMission']);
Route::delete('/deleteMission/{id}', [UserController::class,'deleteMission']);
