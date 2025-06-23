<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\Auth\LoginController;
use App\Http\Controllers\CMS\Auth\RegisterController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\RoleController;
use App\Http\Controllers\CMS\PermissionController;

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

    // Route::resource('users', UserController::class);
    Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:view users');
        Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('permission:add user');
        Route::post('/', [UserController::class, 'store'])->name('store')->middleware('permission:add user');
        Route::get('/{user}', [UserController::class, 'show'])->name('show')->middleware('permission:view users');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('permission:edit user');
        Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('permission:edit user');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:delete user');
    });
    
    Route::prefix('permissions')->name('permissions.')->middleware('auth')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index')->middleware('permission:view permissions');
        Route::get('/create', [PermissionController::class, 'create'])->name('create')->middleware('permission:add permission');
        Route::post('/', [PermissionController::class, 'store'])->name('store')->middleware('permission:add permission');
        Route::get('/{permission}', [PermissionController::class, 'show'])->name('show')->middleware('permission:view permissions');
        Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('edit')->middleware('permission:edit permission');
        Route::put('/{permission}', [PermissionController::class, 'update'])->name('update')->middleware('permission:edit permission');
        Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('destroy')->middleware('permission:delete permission');
    });
    
    // Role-specific permission routes
    Route::get('permissions/role/{roleId}', [PermissionController::class, 'rolePermissions'])->name('permissions.role')->middleware('permission:manage permission');
    Route::post('permissions/role/{roleId}/permission/{permissionId}/assign', [PermissionController::class, 'assignPermission'])->name('permissions.assign')->middleware('permission:manage permission');
    Route::delete('permissions/role/{roleId}/permission/{permissionId}/revoke', [PermissionController::class, 'revokePermission'])->name('permissions.revoke')->middleware('permission:manage permission');

    Route::prefix('roles')->name('roles.')->middleware('auth')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('permission:view roles');
        Route::get('/create', [RoleController::class, 'create'])->name('create')->middleware('permission:add role');
        Route::post('/', [RoleController::class, 'store'])->name('store')->middleware('permission:add role');
        Route::get('/{role}', [RoleController::class, 'show'])->name('show')->middleware('permission:view roles');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit')->middleware('permission:edit role');
        Route::put('/{role}', [RoleController::class, 'update'])->name('update')->middleware('permission:edit role');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy')->middleware('permission:delete role');
    });

    // Other authenticated user routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
});