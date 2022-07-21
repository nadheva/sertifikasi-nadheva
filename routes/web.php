<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataAkademikController;
// use App\Http\Controllers\InformasiPendaftaranController;
// use App\Http\Controllers\Admin\InformasiPendaftaranController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Models\InformasiPendaftaran;
use Illuminate\Contracts\Validation\DataAwareRule;

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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //Auth
    Route::get('login', [AuthenticatedSessionController::class, 'create'] );
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'] );

    //Siswa
    Route::resource('siswa', SiswaController::class)->except('update');

    //Informasi Pendafatran
    Route::resource('informasi-pendaftaran', InformasiController::class)->except('update');
    Route::put('informasi-pendaftaran-update/{id}', [InformasiPendaftaran::class, 'update']);
    //Pendafatran
    Route::resource('pendaftaran', PendaftaranController::class)->except('update');

    //Profile
    Route::resource('profil', ProfileController::class)->except('update');

    //User
    Route::resource('user', UserController::class)->except('update');

    //Data Akademik
    Route::resource('data-akademik', DataAkademikController::class)->except('update', 'approve', 'printpdf');
    Route::get('printpdf/{id}', [DataAkademikController::class, 'printpdf'])->name('printpdf');
    Route::put('data-akademik-approve/{id}', [DataAkademikController::class, 'approve'])->name('data-akademik-approve');
});

require __DIR__.'/auth.php';
