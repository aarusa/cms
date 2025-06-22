<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\Auth\LoginController;
use App\Http\Controllers\CMS\Auth\RegisterController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Dashboard (Accessible by any authenticated user)
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard.index');

// Users module (Accessible only by Super Admin and Admin)
Route::middleware(['auth', 'role:Super Admin|Admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// Other modules (Accessible by all authenticated users, including regular Users)
Route::middleware(['auth'])->group(function () {
    // Example routes
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
});