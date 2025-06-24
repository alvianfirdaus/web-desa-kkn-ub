<!-- Header -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{-- <img src="{{ Auth::user()->desa->logo_desa ? asset('storage/' . Auth::user()->desa->logo_desa) : asset('storage/default_image/default.png') }}" alt="Logo Desa" class="img-fluid" style="max-height: 80px;" alt="" />
            <h1 class="sitename">{{ Auth::user()->desa->nama_desa ?? '' }}</h1> --}}
            <img src="{{ asset('asset_halaman_desa/img/image 1.png') }}" alt="" />
              <h1 class="sitename">Pencontoh</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                {{-- <li><a href="#hero" class="active">Home</a></li> --}}
                <li><a href={{url("/desa")}}>Home</a></li>

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
                    {{-- <a href="http://127.0.0.1:8000/desa/login"><span>Pelayanan Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a> --}}
                    <a href="#"><span>Pelayanan Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href={{url("/desa/surat")}}>Layanan Peyuratan Desa</a></li>
                        <li><a href="#pengaduan">Pengaduan Masyarakat</a></li>
                    </ul>
                </li>
                <!-- <li class="dropdown">
                    <a href="#"><span>Blog</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href={{url("/desa/blog")}}>Berita</a></li>
                        <li><a href={{url("/desa/blog")}}>Pengumuman</a></li>
                        <li><a href={{url("/desa/blog")}}>Parawisata</a></li>
                    </ul>
                </li> -->
                <li><a href="{{ route('petugas.login_form') }}">Login</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
<!-- Ending Header -->
