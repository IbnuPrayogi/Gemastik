  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-slide="true" role="button" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fas fa-right-from-bracket" style="color: red"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center text-decoration-none">
        <img src="{{ asset('assets/images/') }}" alt="" class="brand-image">
        <span class="">Daraka</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 mb-3">
            <div class="info flex-row">
                <img src="{{ asset('assets/icons/user.svg') }}" alt="icon-user" class="brand-image">
                @if (Auth::user())
                    <a href="" class="mx-3 text-decoration-none">{{ Auth::user()->nama_pemilik }}</a>
                @else
                    <a href="" class="mx-3 text-decoration-none">Unauthorized</a>
                @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a role="button" class="nav-link {{ Request::routeIs('admin.user.*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.create') }}" class="nav-link {{ Request::routeIs('admin.user.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link {{ Request::routeIs('admin.user.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Data User</p>
                            </a>
                    </ul>
                </li>
                <li class="nav-item">
                @if (Auth::user()->id_roles == 11)
                    <a role="button" class="nav-link {{ Request::routeIs('admin.laporan.*') ? 'active' : '' }}">
                @else
                    <a role="button" class="nav-link {{ Request::routeIs('client.laporan.*') ? 'active' : '' }}">
                @endif
                    <i class="nav-icon fas fa-solid fa-book-atlas"></i>
                        <p>
                            Laporan Perbaikan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->id_roles == 99)
                        <li class="nav-item">
                            <a href="{{ route('client.laporan.create') }}" class="nav-link {{ Request::routeIs('client.laporan.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Laporan</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            @if (Auth::user()->id_roles == 11)
                                <a href="{{ route('admin.laporan.index') }}" class="nav-link {{ Request::routeIs('admin.laporan.index') ? 'active' : '' }}">
                            @else
                                <a href="{{ route('client.laporan.index') }}" class="nav-link {{ Request::routeIs('client.laporan.index') ? 'active' : '' }}">
                            @endif
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                @if (Auth::user()->id_roles == 11)
                    <a role="button" class="nav-link {{ Request::routeIs('admin.map.*') ? 'active' : '' }}">
                @elseif (Auth::user()->id_roles == 99)
                    <a role="button" class="nav-link {{ Request::routeIs('client.map.*') ? 'active' : '' }}">
                @endif
                        <i class="nav-icon fas fa-solid fa-map-location-dot"></i>
                        <p>
                            Analisis Map
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (Auth::user()->id_roles == 11)
                                <a href="{{ route('admin.map.index') }}" class="nav-link {{ Request::routeIs('admin.map.index') ? 'active' : '' }}">
                            @else
                                <a href="{{ route('client.map.index') }}" class="nav-link {{ Request::routeIs('client.map.index') ? 'active' : '' }}">
                            @endif
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berdasarkan Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Request::routeIs('admin.alumni.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berdasarkan Panjang</p>
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
