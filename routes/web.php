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

// Authentication Routes for Guests only
Route::middleware('guest')->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Logout Route (needs auth)
Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Dashboard home
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Users module - only for Super Admin and Admin roles
    Route::middleware('role:Super Admin|Admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    // Other authenticated user routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
});