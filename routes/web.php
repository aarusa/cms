<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('users', UserController::class);
