<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\perusahaan\PendaftaranPetugasController;
use App\Http\Controllers\perusahaan\DesaController;
use App\Http\Controllers\perusahaan\UserController;
use App\Http\Controllers\desa\PetugasController;
use App\Http\Controllers\perusahaan\DashboardController;
use App\Http\Controllers\desa\DashboardDesaController;
use App\Http\Controllers\auth\perusahaan\AutentikasiController;
use App\Http\Controllers\auth\desa\AutentikasiControllerDesa;
use App\Http\Controllers\auth\desa\ResetPasswordManualController;
use App\Http\Controllers\auth\warga\AutentikasiControllerWarga;
use App\Http\Controllers\desa\blog\BlogController;
use App\Http\Controllers\desa\apbd\ApbdController;
use App\Http\Controllers\desa\adminduk\AdmindukController;
use App\Http\Controllers\desa\landing_page\LandingPageController;
use App\Http\Controllers\desa\ManajemenSuratController;
use App\Http\Controllers\desa\pengaduan\PengaduanMasyarakatController;
use App\Http\Controllers\desa\ProfilControllerDesa;
use App\Http\Controllers\desa\surat\CetakSuratController;
use App\Http\Controllers\desa\surat\SuratKeteranganDomisiliController;
use App\Http\Controllers\desa\surat\SuratKeteranganKelahiranController;
use App\Http\Controllers\notification\NotificationSuratController;
use App\Http\Controllers\warga\DashboardWargaController;
use App\Http\Controllers\perusahaan\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
    
// });
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/ebook', function () {
    return view('halaman_desa.ebook');
})->name('ebook');

Route::get('/persuratan', function () {
    return view('halaman_desa.persuratan');
})->name('persuratan');





// routes autentikasi perusahaan

// routes autentikasi petugas desa
Route::prefix('/')->group(function () {
    // Autentikasi Petugas Desa
    Route::get('/login', [AutentikasiControllerDesa::class, 'showLoginForm'])->name('petugas.login_form');
    Route::post('/login', [AutentikasiControllerDesa::class, 'login'])->name('petugas.login');
    Route::get('/logout', [AutentikasiControllerDesa::class, 'logout'])->name('petugas.logout');

    // Reset Password
    // Route::get('/lupa-password', [AutentikasiControllerDesa::class, 'showForgotPasswordForm'])->name('desa.lupa_password');
    // Menampilkan form lupa password
    
});

// CRUD petugas
Route::prefix('perusahaan/dashboard/manajemen_desa')->group(function () {});


Route::middleware('admin_petugas')->group(function () {
    //dashboard
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardDesaController::class, 'index'])->name('dashboard_petugas.index');

        // Profil
        Route::get('perusahaan/profil', [ProfilControllerDesa::class, 'edit'])->name('profil_petugas.edit');
        Route::post('perusahaan/profil', [ProfilControllerDesa::class, 'update'])->name('profil_petugas.update');

        Route::prefix('manajemen_pegawai')->group(function () {
            Route::get('/', [PetugasController::class, 'index'])->name('petugas.index');
            Route::get('/create', [PetugasController::class, 'create'])->name('petugas.create');
            Route::post('/', [PetugasController::class, 'store'])->name('petugas.store');
            Route::get('/show/{id}', [PetugasController::class, 'show'])->name('petugas.show');
            Route::get('/{petugas}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
            Route::put('/{petugas}', [PetugasController::class, 'update'])->name('petugas.update');
            Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
            Route::get('/petugas/search', [PetugasController::class, 'search'])->name('petugas.search');
            Route::get('/search-by-rfid', [PetugasController::class, 'searchByRFID'])->name('petugas.search-by-rfid');
        });

        
        Route::prefix('apbd')->group(function () {
            Route::get('/', [ApbdController::class, 'index'])->name('apbd.index');
            Route::put('/{id}', [ApbdController::class, 'update'])->name('apbd.update');
        });

        Route::prefix('adminduk')->group(function () {
            Route::get('/', [AdmindukController::class, 'index'])->name('adminduk.index');
            Route::put('/{id}', [AdmindukController::class, 'update'])->name('adminduk.update');
        });


        //manajemen blog
        Route::prefix('manajemen_blog')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('blog.index');
            Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('/', [BlogController::class, 'store'])->name('blog.store');
            Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
            Route::put('/{id}', [BlogController::class, 'update'])->name('blog.update');
            Route::get('/{id}', [BlogController::class, 'show'])->name('blog.show');            
            Route::delete('/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
        });
        
    });
});







