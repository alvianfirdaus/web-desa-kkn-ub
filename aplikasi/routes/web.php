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
use App\Http\Controllers\auth\warga\AutentikasiControllerWarga;
use App\Http\Controllers\desa\blog\BlogController;
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
use App\Http\Controllers\warga\PengaduanWargaController;
use App\Http\Controllers\warga\ProfilControllerWarga;
use App\Http\Controllers\warga\SuratWargaCetakController;

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

Route::get('/', function () {
    return view('welcome');
});

//routes static desa
// Route::get('/desa', function () {
//     return view('halaman_desa.landing_desa');
// });

Route::get('/data-piramida', [LandingPageController::class, 'getDataPiramidaPenduduk']);

Route::get('/desa/infografis_desa/luas_desa', function () {
    return view('halaman_desa.infografis_desa.luas_desa');
});
Route::get('/desa/infografis_desa/jumlah_penduduk', function () {
    return view('halaman_desa.infografis_desa.jumlah_penduduk');
});
Route::get('/desa/infografis_desa/struktur_organisasi', function () {
    return view('halaman_desa.infografis_desa.struktur_organisasi');
});
Route::get('/desa/infografis_desa/visi_misi_desa', function () {
    return view('halaman_desa.infografis_desa.visi_misi');
});

Route::get('/desa/blog', function () {
    return view('halaman_desa.blog.blog');
});
Route::get('/desa/blog/detail', function () {
    return view('halaman_desa.blog.blog_detail');
});

//form pengajuan surat desa
Route::prefix('desa/surat')->group(function () {
    // Route::get('/keterangan_domisili', function () {
    //     return view('halaman_desa.pelayanan_desa.penyuratan.surket_domisili');
    // });
    Route::get('/pindah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_pindah');
    });
    // Route::get('/kelahiran', function () {
    //     return view('halaman_desa.pelayanan_desa.penyuratan.surket_kelahiran');
    // });
    Route::get('/kematian', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_kematian');
    });
    Route::get('/pengantar_ktp_kk', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surpeng_ktp_kk');
    });
    Route::get('/tidak_mampu', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_tidak_mampu');
    });
    Route::get('/usaha', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_usaha');
    });
    Route::get('/ahli_waris', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_ahli_waris');
    });
    Route::get('/tanah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_tanah');
    });
    Route::get('/belum_menikah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_belum_menikah');
    });
    Route::get('/skck', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surpeng_skck');
    });
    Route::get('/keramaian', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.suriz_keramaian');
    });
    Route::get('/akta_kelahiran', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surek_akta_kelahiran');
    });
    Route::get('/akta_kematian', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surek_akta_kematian');
    });
    Route::get('/bpjs', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surpeng_bpjs');
    });
    Route::get('/bansos', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_bansos');
    });
    Route::get('/disabilitas', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_disabilitas');
    });
    Route::get('/tidak_mampu_beasiswa', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_tidak_mampu_beasiswa');
    });
    Route::get('/pindah_sekolah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_pindah_sekolah');
    });
    Route::get('/pendaftaran_sekolah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surek_pendaftaran_sekolah');
    });
    Route::get('/nikah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surpeng_nikah');
    });
    Route::get('/status_pernikahan', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_status_perkawinan');
    });
    Route::get('/perceraian', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_perceraian');
    });
    Route::get('/bekerja', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_bekerja');
    });
    Route::get('/tidak_bekerja', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_tidak_bekerja');
    });
    Route::get('/rekomendasi_pekerjaan', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surek_pekerjaan');
    });
    Route::get('/tanah_warisan', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_tanah_warisan');
    });
    Route::get('/riwayat_tanah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_riwayat_tanah');
    });
    Route::get('/pembuatan_sertifikat_tanah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surpeng_pembuatan_sertifikat_tanah');
    });
    Route::get('/sehat', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_sehat');
    });
    Route::get('/kehilangan_barang', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_kehilangan_barang');
    });
    Route::get('/donor_darah', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surpeng_donor_darah');
    });
    Route::get('/kur', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surek_kur');
    });
    Route::get('/umkm', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_umkm');
    });
    Route::get('/izin_usaha_mikro', function () {
        return view('halaman_desa.pelayanan_desa.penyuratan.surket_izin_usaha_mikro');
    });
});


Route::get('/desa/test', function () {
    return view('halaman_desa.test');
});

Route::get('/desa/dashboard/manajemen_layanan/surat', function () {
    return view('halaman_desa.manajemen_layanan.persuratan.index');
});
Route::get('/desa/dashboard/manajemen_layanan/surat/create', function () {
    return view('halaman_desa.manajemen_layanan.persuratan.create');
});
Route::get('/desa/dashboard/manajemen_layanan/surat/show', function () {
    return view('halaman_desa.manajemen_layanan.persuratan.show');
});
Route::get('/desa/dashboard/manajemen_layanan/udate', function () {
    return view('halaman_desa.manajemen_layanan.persuratan.update');
});

Route::get('/desa/login', function () {
    return view('halaman_desa.login_form');
});
Route::get('/desa/reset_password', function () {
    return view('halaman_desa.reset_password_form');
});
Route::get('/desa/register', function () {
    return view('halaman_desa.register_form');
});
Route::get('/desa/surat', function () {
    return view('halaman_desa.surat');
});

// routes static perusahaan
Route::get('/perusahaan', function () {
    return view('halaman_perusahaan.landing_perusahaan');
});
Route::get('/perusahaan/test', function () {
    return view('halaman_perusahaan.test');
});

Route::get('/desa', [LandingPageController::class, 'index'])->name('landing');

// routes autentikasi perusahaan
Route::prefix('perusahaan')->group(function () {
    // Autentikasi Admin Perusahaan
    Route::get('/login', [AutentikasiController::class, 'showLoginForm'])->name('admin.login_form');
    Route::post('/login', [AutentikasiController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AutentikasiController::class, 'logout'])->name('admin.logout');

    // Pendaftaran Petugas Desa
    Route::get('/register', [PendaftaranPetugasController::class, 'register'])->name('pendaftar.form');
    Route::post('/register', [PendaftaranPetugasController::class, 'daftar'])->name('pendaftar.register');
    Route::get('/status/{id}', [PendaftaranPetugasController::class, 'status'])->name('pendaftar.status');
});

// Reset Password
Route::get('/lupa-password', [AutentikasiController::class, 'showForgotPasswordForm'])->name('admin.forgot_password');
Route::post('/lupa-password', [AutentikasiController::class, 'sendResetLink'])->name('admin.send_reset_link');
Route::post('/reset-password', [AutentikasiController::class, 'resetPassword'])->name('admin.reset_password');
Route::get('/reset-password/{token}', [AutentikasiController::class, 'showResetPasswordForm'])
    ->name('password.reset');

Route::middleware('admin')->group(function () {
    // Profil
    Route::get('perusahaan/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('perusahaan/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Dasboard
    Route::prefix('perusahaan/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    });

    // CRUD pendaftaran petugas
    Route::prefix('perusahaan/dashboard/manajemen_user/pendaftaran_petugas')->group(function () {
        Route::get('/', [PendaftaranPetugasController::class, 'index'])->name('pendaftaran.index');
        Route::get('/create', [PendaftaranPetugasController::class, 'create'])->name('pendaftaran.create');
        Route::post('/', [PendaftaranPetugasController::class, 'store'])->name('pendaftaran.store');
        Route::get('/show/{id}', [PendaftaranPetugasController::class, 'show'])->name('pendaftaran.show');
        Route::get('/{id}/edit', [PendaftaranPetugasController::class, 'edit'])->name('pendaftaran.edit');
        Route::put('/{id}', [PendaftaranPetugasController::class, 'update'])->name('pendaftaran.update');
        Route::delete('/{id}', [PendaftaranPetugasController::class, 'destroy'])->name('pendaftaran.destroy');
        Route::get('/search', [PendaftaranPetugasController::class, 'search'])->name('pendaftaran.search');
    });

    // CRUD manajemen user
    Route::prefix('perusahaan/dashboard/manajemen_user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
    });

    // CRUD manajemen desa
    Route::prefix('perusahaan/dashboard/manajemen_desa')->group(function () {
        Route::get('/', [DesaController::class, 'index'])->name('desa.index');
        Route::get('/create', [DesaController::class, 'create'])->name('desa.create');
        Route::post('/', [DesaController::class, 'store'])->name('desa.store');
        Route::get('/show/{id}', [DesaController::class, 'show'])->name('desa.show');
        Route::get('/{id}/edit', [DesaController::class, 'edit'])->name('desa.edit');
        Route::put('/{id}', [DesaController::class, 'update'])->name('desa.update');
        Route::delete('/{id}', [DesaController::class, 'destroy'])->name('desa.destroy');
        Route::get('/search', [DesaController::class, 'search'])->name('desa.search');
    });
});







// routes autentikasi petugas desa
Route::prefix('desa')->group(function () {
    // Autentikasi Petugas Desa
    Route::get('/login', [AutentikasiControllerDesa::class, 'showLoginForm'])->name('petugas.login_form');
    Route::post('/login', [AutentikasiControllerDesa::class, 'login'])->name('petugas.login');
    Route::get('/logout', [AutentikasiControllerDesa::class, 'logout'])->name('petugas.logout');

    // Reset Password
    Route::get('/lupa-password', [AutentikasiControllerDesa::class, 'showForgotPasswordForm'])->name('desa.lupa_password');
});

// CRUD petugas
Route::prefix('perusahaan/dashboard/manajemen_desa')->group(function () {});




Route::middleware('admin_petugas')->group(function () {
    //dashboard
    Route::prefix('desa/dashboard')->group(function () {
        Route::get('/', [DashboardDesaController::class, 'index'])->name('dashboard_petugas.index');

        // Profil
        Route::get('perusahaan/profil', [ProfilControllerDesa::class, 'edit'])->name('profil_petugas.edit');
        Route::post('perusahaan/profil', [ProfilControllerDesa::class, 'update'])->name('profil_petugas.update');

        Route::prefix('manajemen_warga')->group(function () {
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

        //CRUD Surat Desa (relasi polymorph)
        Route::prefix('manajemen_surat')->group(function () {
            // Semua surat
            Route::get('/', [ManajemenSuratController::class, 'index'])->name('manajemen_surat.index');

            // Lihat detail surat (yang akan diarahkan ke controller masing-masing jenis surat)
            Route::get('/show/{id}', [ManajemenSuratController::class, 'show'])->name('manajemen_surat.show');

            // Edit surat
            Route::get('/edit/{id}', [ManajemenSuratController::class, 'edit'])->name('manajemen_surat.edit');

            // Update surat dan status
            Route::put('update/{id}', [ManajemenSuratController::class, 'update'])->name('manajemen_surat.update');

            // Hapus surat
            Route::delete('/{id}', [ManajemenSuratController::class, 'destroy'])->name('manajemen_surat.destroy');
        });
        // Rute Notifikasi surat masuk
        Route::prefix('notifications')->group(function () {
            Route::get('/unread-count', [NotificationSuratController::class, 'unreadCount'])->name('notifications.unread-count');
            Route::get('/latest', [NotificationSuratController::class, 'latest'])->name('notifications.latest');
            Route::post('/{notification}/mark-as-read', [NotificationSuratController::class, 'markAsRead'])->name('notifications.mark-as-read');
            Route::get('/notifications/latest', [NotificationSuratController::class, 'latest'])->name('notifications.latest');
            Route::post('/mark-all-read', [NotificationSuratController::class, 'markAllRead'])->name('notifications.mark-all-read');
        });

        Route::prefix('manajemen_pengaduan')->group(function () {
            Route::get('/pengaduan', [PengaduanMasyarakatController::class, 'index'])->name('manajemen_pengaduan.index');
            Route::get('/show/{id}', [PengaduanMasyarakatController::class, 'show'])->name('manajemen_pengaduan.show');
            Route::get('/pengaduan/edit/{id}', [PengaduanMasyarakatController::class, 'edit'])->name('manajemen_pengaduan.edit');
            Route::put('/pengaduan/{id}', [PengaduanMasyarakatController::class, 'update'])->name('manajemen_pengaduan.update');
            Route::delete('/pengaduan/{id}', [PengaduanMasyarakatController::class, 'destroy'])->name('manajemen_pengaduan.destroy');
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

//static url
Route::get('/desa/dashboard/manajemen_web/berita/create', function () {
    return view('halaman_desa.manajemen_web.berita.create');
});
Route::get('/desa/dashboard/manajemen_web/berita/update', function () {
    return view('halaman_desa.manajemen_web.berita.update');
});
Route::get('/desa/dashboard/manajemen_web/berita/show', function () {
    return view('halaman_desa.manajemen_web.berita.show');
});
Route::get('/desa/dashboard/manajemen_web/parawisata/create', function () {
    return view('halaman_desa.manajemen_web.parawisata.create');
});
Route::get('/desa/dashboard/manajemen_web/parawisata/update', function () {
    return view('halaman_desa.manajemen_web.parawisata.update');
});
Route::get('/desa/dashboard/manajemen_web/parawisata/show', function () {
    return view('halaman_desa.manajemen_web.parawisata.show');
});
Route::get('/desa/dashboard/manajemen_web/pengumuman/create', function () {
    return view('halaman_desa.manajemen_web.pengumuman.create');
});
Route::get('/desa/dashboard/manajemen_web/pengumuman/update', function () {
    return view('halaman_desa.manajemen_web.pengumuman.update');
});
Route::get('/desa/dashboard/manajemen_web/pengumuman/show', function () {
    return view('halaman_desa.manajemen_web.pengumuman.show');
});


// routes login warga
Route::prefix('warga')->group(function () {
    // Autentikasi Warga Desa
    Route::get('/login', [AutentikasiControllerWarga::class, 'showLoginForm'])->name('warga.login_form');
    Route::post('/login', [AutentikasiControllerWarga::class, 'login'])->name('warga.login');
    Route::get('/logout', [AutentikasiControllerWarga::class, 'logout'])->name('warga.logout');

    // Reset Password
    Route::get('/lupa-password', [AutentikasiControllerWarga::class, 'showForgotPasswordForm'])->name('warga.lupa_password');
});



//landing page tanpa login
Route::get('/desa', [LandingPageController::class, 'index'])->name('landing');

// routes warga
Route::middleware('full_akses')->group(function () {
    //Route::get('/desa', [LandingPageController::class, 'index'])->name('landing');
    Route::prefix('warga/profile')->group(function () {
        // Profil
        Route::get('/', [ProfilControllerWarga::class, 'edit'])->name('profil_warga.edit');
        Route::post('/', [ProfilControllerWarga::class, 'update'])->name('profil_warga.update');
    });

    Route::prefix('warga/dashboard')->group(function () {
        Route::get('/', [DashboardWargaController::class, 'index'])->name('dashboard_warga.index');
    });

    //routes membuat surat
    Route::prefix('warga/surat')->group(function () {
        Route::get('/keterangan_domisili', [SuratKeteranganDomisiliController::class, 'ShowForm'])->name('keterangan_domisili.form');
        Route::post('/keterangan_domisili/store', [SuratKeteranganDomisiliController::class, 'store'])->name('keterangan_domisili.store');
        Route::get('/keterangan_kelahiran', [SuratKeteranganKelahiranController::class, 'ShowForm'])->name('keterangan_kelahiran.form');
        Route::post('/keterangan_kelahiran/store', [SuratKeteranganKelahiranController::class, 'store'])->name('keterangan_kelahiran.store');
    });

    Route::prefix('warga/surat/')->group(function () {
        Route::get('/', [SuratWargaCetakController::class, 'index'])->name('warga.surat.index');
        Route::get('/cetak/{id}', [CetakSuratController::class, 'cetak'])->name('warga.surat.cetak');
    });

    // routes pengaduan masyarakat
    Route::post('warga/', [PengaduanMasyarakatController::class, 'store'])->name('pengaduan.store');

    Route::prefix('warga/pengaduan')->group(function () {
        Route::get('/', [PengaduanWargaController::class, 'index'])->name('warga.pengaduan.index');
    });
});
