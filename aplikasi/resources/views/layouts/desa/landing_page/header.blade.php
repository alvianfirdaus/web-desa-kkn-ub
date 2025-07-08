<!-- Header -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center mepet-kiri">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{-- <img src="{{ Auth::user()->desa->logo_desa ? asset('storage/' . Auth::user()->desa->logo_desa) : asset('storage/default_image/default.png') }}" alt="Logo Desa" class="img-fluid" style="max-height: 80px;" alt="" />
            <h1 class="sitename">{{ Auth::user()->desa->nama_desa ?? '' }}</h1> --}}
            <img src="{{ asset('asset_halaman_desa/img/malangkab.png') }}" alt="" />
              <h1 class="sitename">Dusun Bumirejo</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                {{-- <li><a href="#hero" class="active">Home</a></li> --}}
                <li><a href={{ route('landing') }}>Home</a></li>

                <!-- <li class="dropdown">
                    <a href="#"><span>Infografis Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href={{url("/desa/infografis_desa/luas_desa")}}>Luas Desa</a></li>
                        <li><a href={{url("/desa/infografis_desa/jumlah_penduduk")}}>Jumlah Penduduk P/L</a></li>
                        <li><a href={{url("/desa/infografis_desa/struktur_organisasi")}}>Struktur Organisasi</a></li>
                        <li><a href={{url("/desa/infografis_desa/visi_misi_desa")}}>Visi Misi Desa</a></li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    {{-- <a href="http://127.0.0.1:8000/desa/login"><span>Layanan Desa Digital</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a> --}}
                    <a href="#"><span>Layanan Desa Digital</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="https://hukum.ub.ac.id/id/badan-konsultasi-dan-bantuan-hukum" target="_blank">Bantuan Hukum</a></li>
                        <li><a href="{{ route('ebook') }}">E-Book Hukum</a></li>
                        <li><a href="#pengaduan">Pengaduan Masyarakat</a></li>
                        <li><a href="{{ route('persuratan') }}">Persuratan</a></li>
                    </ul>
                </li>
                
                <li><a href="{{ route('petugas.login_form') }}">Login</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>

<style>
  .mepet-kiri {
    margin-left: 0 !important;
    padding-left: 0 !important;
  }

  /* Optional: atur container-nya juga */
  .header .container-fluid {
    padding-left: 10px; /* atau 0 jika benar-benar ingin mepet */
  }
</style>

