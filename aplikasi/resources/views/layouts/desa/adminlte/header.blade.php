<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('petugas.logout') }}" class="nav-link">Logout</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <div class="dropdown notification-dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="notificationDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell"></i>
                <span class="badge badge-danger" id="notification-counter"
                    style="display: {{ auth()->user()->unreadNotifications->count() ? 'inline-block' : 'none' }}">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                <div class="dropdown-header d-flex justify-content-between">
                    <span>Notifikasi</span>
                    <a href="#" id="mark-all-read" class="small">Tandai semua dibaca</a>
                </div>
                <div class="dropdown-divider"></div>
                <div id="notification-items">
                    <!-- Notifikasi akan dimuat via JavaScript -->
                </div>
                <div class="dropdown-divider"></div>
            </div>
        </div>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
