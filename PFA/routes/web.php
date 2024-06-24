<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MissionController;


Route::get('/', function () {
    return view('welcome');
});

// Route pour la page d'accueil
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route pour la page admin
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

// Routes CRUD pour les utilisateurs
Route::resource('users', UserController::class);
Route::resource('missions', MissionController::class);
