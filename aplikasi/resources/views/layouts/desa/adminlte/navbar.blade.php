<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color:rgb(21, 30, 60)">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard_petugas.index') }}" class="brand-link" style="color: #f0f0f0;">
        <img src="{{ asset('asset_halaman_desa/img/malangkab.png') }}" alt="Logo Desa"
        class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light" style="color: #f0f0f0;">Admin Desa</span>
        {{-- <span class="brand-text font-weight-light" style="color: #f0f0f0;">
            Admin Desa {{ Auth::user()->desa->nama_desa ?? '' }}
        </span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('storage/default_image/default.png') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <a href="{{ route('profil_petugas.edit') }}" class="d-block" style="color: #f0f0f0;">
                    {{ Auth::user()->nama_lengkap ?? 'Bapak Admin Desa' }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- <li class="nav-header">EXAMPLES</li> --}}

                <li class="nav-item">
                    <a href="{{ route('dashboard_petugas.index') }}" class="nav-link" style="color: #f0f0f0;">
                        <i class="nav-icon fa fa-house-chimney" style="color: #f0f0f0;"></i>
                        <p>Dasboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('petugas.index') }}" class="nav-link" style="color: #f0f0f0;">
                        <i class="nav-icon fa fa-users" style="color: #f0f0f0;"></i>
                        <p>Akun Perangkat Desa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('blog.index') }}" class="nav-link" style="color: #f0f0f0;">
                        <i class="nav-icon fa fa-blog" style="color: #f0f0f0;"></i>
                        <p>Manajemen Galeri</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" style="color: #f0f0f0;">
                        <i class="nav-icon fa fa-database"></i>
                        <p>
                            Manajemen data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{ route('apbd.index') }}" class="nav-link" style="color: #f0f0f0;">
                                <i class="far fa-envelope nav-icon"></i>
                                <p>APBD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminduk.index') }}" class="nav-link" style="color: #f0f0f0;">
                                <i class="fa-solid fa-bullhorn nav-icon"></i>
                                <p style="font-size: 14px;">Statistik Penduduk</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
