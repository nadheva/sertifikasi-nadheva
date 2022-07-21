<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataAkademikController;
use App\Http\Controllers\Admin\InformasiPendaftaranController;
use App\Http\Controllers\User\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
    //Auth
    Route::get('login', [AuthenticatedSessionController::class, 'create'] );
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'] );

    //Informasi Pendafatran
    Route::resource('informasi-pendaftaran', InformasiPendaftaranController::class)->except('update');

    //Pendafatran
    Route::resource('pendaftaran', PendaftaranController::class)->except('update');

    //Profile
    Route::resource('profile', ProfileController::class)->except('update');

    //User
    Route::resource('user', UserController::class)->except('update');

    //Data Akademik
    Route::resource('data-akademik', DataAkademikController::class)->except('update');
});

require __DIR__.'/auth.php';
