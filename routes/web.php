<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\OrganizationController;
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
    Route::get('dashboard', 'index')->name('pagu');
    Route::get('profile', 'profile')->name('profile');
    Route::get('agenda', 'agenda')->name('agenda');
    Route::get('contact', 'contact')->name('contact');
});

// Menu admin
Route::middleware(['auth', 'role:Admin'])->controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {

    // Manage User
    Route::get('manage-users', 'manageUser')->name('manageUser');
    Route::post('upload-user', 'uploadUser')->name('uploadUser');
    Route::post('verify', 'verify')->name('verify');
    Route::post('unverify', 'unverify')->name('unverify');
    Route::delete('users', 'deleteUsers')->name('deleteUsers');

    // Manage Election
    Route::get('manage-election', 'manageElection')->name('manageElection');
    Route::get('election-agenda/{id}', 'manageElectionAgenda')->name('manageElectionAgenda');
    Route::post('sync-agenda', 'syncAgenda')->name('syncAgenda');
});

Route::middleware('auth')->controller(ElectionController::class)->name('election.')->group(function () {
    Route::get('election', 'index')->name('index');
    Route::get('election/{id}', 'show')->name('show');

    // Admin privileges
    Route::middleware('role:Admin')->group(function () {
        Route::get('add-election', 'create')->name('create');
        Route::delete('election', 'destroy')->name('delete');
        Route::post('change-status', 'changeStatus')->name('changeStatus');
        Route::post('save-election', 'store')->name('store');
    });

    // Vote
    Route::get('coblos', 'coblos')->name('coblos');
    Route::get('coblos/{id}', 'votePage')->name('votePage');

    Route::get('result', 'result')->name('result.index');
    Route::get('result/1', 'showResult')->name('result.show');
});

Route::middleware('auth')->prefix('candidate')->name('candidate.')->controller(CandidateController::class)->group(function () {
    Route::get('/{id}', 'show')->name('show');

    // Admin privileges
    Route::middleware('role:Admin')->group(function () {
        Route::get('add/{id}', 'create')->name('create');
        Route::post('save', 'store')->name('store');
        Route::put('number', 'changeNumber')->name('changeNumber');
        Route::delete('delete', 'destroy')->name('delete');
    });
});

Route::middleware('auth')->controller(OrganizationController::class)->prefix('km')->name('km.')->group(function () {
    Route::get('/', 'index')->name('index');
});
