<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectionController;
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

// Otentikasi
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');

    Route::post('logout', 'logout')->name('logout')->withoutMiddleware('guest')->middleware('auth');
});


// Landing page
Route::get('/', function () {
    abort(404);
});


// Menu dashboard polos
Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('pagu');
});

// Menu admin
Route::middleware(['auth', 'role:Admin'])->controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('manage-users', 'manageUser')->name('manageUser');

    Route::post('upload-user', 'uploadUser')->name('uploadUser');
    Route::post('verify', 'verify')->name('verify');
    Route::post('unverify', 'unverify')->name('unverify');
    Route::delete('users', 'deleteUsers')->name('deleteUsers');
});

Route::middleware('auth')->controller(ElectionController::class)->name('election.')->group(function () {
    Route::get('coblos', 'coblos')->name('coblos');
    Route::get('coblos/1', 'votePage')->name('votePage');

    Route::get('result', 'result')->name('result.index');
    Route::get('election', 'election')->name('index');
});
