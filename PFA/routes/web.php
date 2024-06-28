<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeAgain;
use App\Mail\Welcome;

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', [ContactController::class, 'contact']);
Route::post('contact', [ContactController::class, 'send'])->name('send');

// Route for the home page
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route for the admin page
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

// CRUD routes for users
Route::resource('users', UserController::class);
Route::resource('missions', MissionController::class);
