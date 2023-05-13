<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;

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

// Landing page
Route::get('/', function () {
    $data = DB::table('site_settings')->get();

    $data = $data->mapWithKeys(function ($value, $key) {
        return [$value->data => $value->value];
    })->toArray();

    return view('Landing-page.index', compact('data'));
})->name('landing');

// Otentikasi
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');

    Route::post('logout', 'logout')->name('logout')->withoutMiddleware('guest')->middleware('auth');

    Route::get('forgot', 'forgot')->name('forgot');
    Route::post('send-forgot-request', 'forgotRequest')->name('forgot.request');
    Route::get('reset-password/{token}', 'resetPassword')->name('password.reset');
    Route::post('reset-password-request', 'resetPasswordRequest')->name('password.request');
});



// Menu dashboard polos
Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('pagu');
    Route::get('profile', 'profile')->name('profile');
    Route::get('agenda', 'agenda')->name('agenda');
    Route::get('contact', 'contact')->name('contact');
    Route::get('send-mail', 'testMail')->name('test-mail');
});

// Menu admin
Route::middleware(['auth', 'role:Admin'])->controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {

    // Manage User
    Route::get('manage-users', 'manageUser')->name('manageUser');
    Route::get('edit-user/{user}', 'editUser')->name('editUser');
    Route::post('update-user', 'updateUser')->name('updateUser');
    Route::post('upload-user', 'uploadUser')->name('uploadUser');
    Route::post('verify', 'verify')->name('verify');
    Route::post('unverify', 'unverify')->name('unverify');
    Route::delete('users', 'deleteUsers')->name('deleteUsers');
    Route::post('send-activation', 'activate')->name('activate');
    Route::post('truncate-activation', 'truncateActivation')->name('truncateActivation');

    // Manage Election
    Route::get('manage-election', 'manageElection')->name('manageElection');
    Route::get('election-agenda/{id}', 'manageElectionAgenda')->name('manageElectionAgenda');
    Route::post('sync-agenda', 'syncAgenda')->name('syncAgenda');

    // Manage sites
    Route::get('manage-sites', 'manageSites')->name('manageSites');
    Route::post('update-site', 'updateSite')->name('updateSite');
});

Route::middleware('auth')->controller(ElectionController::class)->name('election.')->group(function () {
    // Admin privileges
    Route::middleware('role:Admin')->group(function () {
        Route::delete('election/delete', 'destroy')->name('delete');
        Route::get('add-election', 'create')->name('create');
        Route::get('edit-election/{election}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('change-status', 'changeStatus')->name('changeStatus');
        Route::post('save-election', 'store')->name('store');
        Route::post('end-election', 'end')->name('end');
        Route::post('open-result', 'openResult')->name('openResult');
    });

    Route::get('election', 'index')->name('index');
    Route::get('election/{id}', 'show')->name('show');

    // Vote
    Route::get('coblos', 'coblos')->name('coblos');
    Route::get('coblos/{id}', 'votePage')->name('votePage');
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

    Route::middleware('role:Admin')->group(function () {
        Route::get('manage', 'admin')->name('manage');
        Route::delete('organization', 'destroy')->name('delete');
    });
});

Route::middleware('auth')->name('vote.')->controller(VoteController::class)->group(function () {
    Route::post('coblos', 'store')->name('store');

    Route::get('result', 'result')->name('result.index');
    Route::get('result/{id}', 'showResult')->name('result.show');
});

Route::middleware('auth')->name('user.')->prefix('user')->controller(UserController::class)->group(function () {
    Route::delete('picture', 'deletePicture')->name('deletePicture');
});
