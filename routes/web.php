<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
    Route::get('manage-users', 'manageUser')->name('manageUser');
    Route::get('manage-election', 'manageElection')->name('manageElection');
    Route::get('election-agenda/{id}', 'manageElectionAgenda')->name('manageElectionAgenda');
    Route::get('election-candidate/{id}', 'manageCandidates')->name('manageCandidates');
    Route::get('add-candidate', 'createCandidate')->name('createCandidate');

    Route::post('upload-user', 'uploadUser')->name('uploadUser');
    Route::post('verify', 'verify')->name('verify');
    Route::post('unverify', 'unverify')->name('unverify');
    Route::post('save-candidate', 'storeCandidate')->name('storeCandidate');


    Route::post('sync-agenda', 'syncAgenda')->name('syncAgenda');

    Route::post('change-election-status', 'changeElectionStatus')->name('electionStatus');

    Route::delete('users', 'deleteUsers')->name('deleteUsers');
    Route::delete('election', 'deleteElection')->name('deleteElection');
    Route::delete('candidate', 'deleteCandidate')->name('deleteCandidate');
});

Route::middleware('auth')->controller(ElectionController::class)->name('election.')->group(function () {
    Route::get('coblos', 'coblos')->name('coblos');
    Route::get('coblos/{id}', 'votePage')->name('votePage');

    Route::get('result', 'result')->name('result.index');
    Route::get('result/1', 'showResult')->name('result.show');

    Route::get('election', 'index')->name('index');
    Route::get('election/{id}', 'show')->name('show');
    Route::middleware('role:Admin')->group(function () {
        Route::get('add-election', 'create')->name('create');
        Route::delete('election', 'destroy')->name('delete');
    });

    Route::post('save-election', 'store')->name('store');
});

Route::middleware('auth')->controller(OrganizationController::class)->prefix('km')->name('km.')->group(function () {
    Route::get('/', 'index')->name('index');
});
