<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Route pour l'affichage de tous les utilisateurs
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Exemple de route pour calculer le taux d'installation (peut être différent selon votre implémentation)
Route::get('/users/{user}/rate', [UserController::class, 'calculateInstallationRate'])->name('users.rate');



Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin',[AdminController::class, 'admin']);
Route::get('/home',[HomeController::class, 'index']);
