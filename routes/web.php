<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');

    Route::post('logout', 'logout')->name('logout')->withoutMiddleware('guest')->middleware('auth');
});

Route::middleware('auth')->group(function () {
});

Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('pagu');
});

Route::middleware(['auth', 'role:Admin'])->controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('manage-users', 'manageUser')->name('manageUser');
});
