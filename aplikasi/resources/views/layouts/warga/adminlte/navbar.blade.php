<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color: #168d06">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="color: #f0f0f0;">
        <img src="{{ asset('storage/' . (Auth::user()->desa->logo_desa ?? 'default_image/default.png')) }}"
            alt="Logo Desa" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light" style="color: #f0f0f0;">Warga Desa</span>
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
                <a href="{{ route('profil_warga.edit') }}" class="d-block" style="color: #f0f0f0;">
                    {{ Auth::user()->nama_lengkap ?? 'Warga Desa' }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- <li class="nav-header">EXAMPLES</li> --}}

                <li class="nav-item">
                    <a href="{{ route('dashboard_warga.index') }}" class="nav-link" style="color: #f0f0f0;">
                        <i class="nav-icon fa fa-house-chimney" style="color: #f0f0f0;"></i>
                        <p>Dasboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('warga.surat.index') }}" class="nav-link"
                        style="color: #f0f0f0;">
                        <i class="far fa-envelope nav-icon"></i>
                        <p>Persuratan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('warga.pengaduan.index') }}" class="nav-link"
                        style="color: #f0f0f0;">
                        <i class="fa-solid fa-bullhorn nav-icon"></i>
                        <p>Pengaduan</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
