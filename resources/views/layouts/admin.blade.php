<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMA CENDIKIA</title>

    <meta name="description" content="Sistem Informasi Sekolah SMKS YPC TASIKMALAYA">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        .site-footer {
    width: calc(100% + 80px);
    margin-left: -40px !important;
    margin-right: -40px !important;
    margin-bottom: -30px !important;
    padding: 22px 20px;
    background: #2b6cb0;
    color: #FFFFFF;
    border-radius: 0 !important;
    box-shadow: none !important;
}
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar-wrapper" id="sidebar">

        <!-- BRAND -->
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <i class="bi bi-asterisk"></i>
            <span>SMA CENDIKIA</span>
        </a>


        <!-- SIDEBAR MENU -->
        <div class="flex-grow-1 overflow-y-auto sidebar-scroll">

            {{-- DASHBOARD --}}
            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    MENU
                </div>

                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.dashboard') }}"
                           class="sidebar-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <i class="fa-solid fa-table-cells-large"></i>

                            <span>Dashboard</span>

                        </a>

                    </li>

                </ul>

            </div>


            {{-- DATA MASTER --}}
            @php
                $dataMasterOpen =
                    request()->routeIs('admin.guru*') ||
                    request()->routeIs('admin.siswa*');
            @endphp

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title sidebar-dropdown"
                     data-bs-toggle="collapse"
                     data-bs-target="#dataMasterMenu"
                     aria-expanded="{{ $dataMasterOpen ? 'true' : 'false' }}">

                    <span>
                        <i class="fa-solid fa-database me-2"></i>
                        DATA MASTER
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>

                </div>


                <div class="collapse {{ $dataMasterOpen ? 'show' : '' }}"
                     id="dataMasterMenu">

                    <ul class="sidebar-menu-list">

                        {{-- GURU --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.guru') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">

                                <i class="fa-solid fa-chalkboard-user"></i>

                                <span>Guru</span>

                            </a>

                        </li>


                        {{-- SISWA --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.siswa') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}">

                                <i class="fa-solid fa-users"></i>

                                <span>Siswa</span>

                            </a>

                        </li>

                    </ul>

                </div>

            </div>


            {{-- KESISWAAN --}}
            @php
                $kesiswaanOpen =
                    request()->routeIs('admin.prestasi*') ||
                    request()->routeIs('admin.ektrakurikuler*');
            @endphp

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title sidebar-dropdown"
                     data-bs-toggle="collapse"
                     data-bs-target="#kesiswaanMenu"
                     aria-expanded="{{ $kesiswaanOpen ? 'true' : 'false' }}">

                    <span>
                        <i class="fa-solid fa-user-graduate me-2"></i>
                        KESISWAAN
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>

                </div>


                <div class="collapse {{ $kesiswaanOpen ? 'show' : '' }}"
                     id="kesiswaanMenu">

                    <ul class="sidebar-menu-list">

                        {{-- PRESTASI --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.prestasi') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.prestasi*') ? 'active' : '' }}">

                                <i class="fa-solid fa-medal"></i>

                                <span>Prestasi</span>

                            </a>

                        </li>


                        {{-- EKSTRAKURIKULER --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.ektrakurikuler') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.ektrakurikuler*') ? 'active' : '' }}">

                                <i class="fa-solid fa-puzzle-piece"></i>

                                <span>Ekstrakurikuler</span>

                            </a>

                        </li>

                    </ul>

                </div>

            </div>


            {{-- PUBLIKASI --}}
            @php
                $publikasiOpen =
                    request()->routeIs('admin.pengumuman*') ||
                    request()->routeIs('admin.berita*') ||
                    request()->routeIs('admin.galeri*');
            @endphp

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title sidebar-dropdown"
                     data-bs-toggle="collapse"
                     data-bs-target="#publikasiMenu"
                     aria-expanded="{{ $publikasiOpen ? 'true' : 'false' }}">

                    <span>
                        <i class="fa-solid fa-bullhorn me-2"></i>
                        PUBLIKASI
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>

                </div>


                <div class="collapse {{ $publikasiOpen ? 'show' : '' }}"
                     id="publikasiMenu">

                    <ul class="sidebar-menu-list">

                        {{-- PENGUMUMAN --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.pengumuman') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}">

                                <i class="fa-solid fa-clipboard-list"></i>

                                <span>Pengumuman</span>

                            </a>

                        </li>


                        {{-- BERITA --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.berita') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">

                                <i class="fa-solid fa-newspaper"></i>

                                <span>Berita</span>

                            </a>

                        </li>


                        {{-- GALERI --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.galeri') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">

                                <i class="fa-solid fa-images"></i>

                                <span>Galeri</span>

                            </a>

                        </li>

                    </ul>

                </div>

            </div>


            {{-- PENGATURAN --}}
            @php
                $pengaturanOpen =
                    request()->routeIs('admin.profil*') ||
                    request()->routeIs('admin.user*');
            @endphp

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title sidebar-dropdown"
                     data-bs-toggle="collapse"
                     data-bs-target="#pengaturanMenu"
                     aria-expanded="{{ $pengaturanOpen ? 'true' : 'false' }}">

                    <span>
                        <i class="fa-solid fa-gear me-2"></i>
                        PENGATURAN
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>

                </div>


                <div class="collapse {{ $pengaturanOpen ? 'show' : '' }}"
                     id="pengaturanMenu">

                    <ul class="sidebar-menu-list">

                        {{-- PROFIL SEKOLAH --}}
                        <li class="sidebar-menu-item">

                            <a href="{{ route('admin.profil') }}"
                               class="sidebar-menu-link {{ request()->routeIs('admin.profil*') ? 'active' : '' }}">

                                <i class="fa-solid fa-school"></i>

                                <span>Profil Sekolah</span>

                            </a>

                        </li>


                        {{-- USER --}}
                        @if(session('user_role') === 'Admin')
                            <li class="sidebar-menu-item">

                                <a href="{{ route('admin.user') }}"
                                   class="sidebar-menu-link {{ request()->routeIs('admin.user*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user"></i>
                                    <span>Kelola User</span>

                                </a>
                            </li>
                        @endif

                    </ul>

                </div>

            </div>

        </div>

        <!-- END SIDEBAR MENU -->


        <!-- PROFILE SIDEBAR -->
        <div class="sidebar-profile">

            <img src="{{ asset('assets/images/profil2.jpg') }}"
                 alt="Profile"
                 class="sidebar-profile-img">

            <div class="sidebar-profile-info">

                <div class="sidebar-profile-name">
                    {{ session('user_name', 'Melani Azahra') }}
                </div>

                <div class="sidebar-profile-email">
                    {{ session('user_role', 'Admin') }}
                </div>

            </div>


            <!-- LOGOUT -->
            <form action="{{ route('logout') }}"
                  method="POST"
                  class="sidebar-logout-form">

                @csrf

                <button type="submit" class="sidebar-logout">

                    <i class="fas fa-sign-out-alt"></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>
        <!-- END PROFILE SIDEBAR -->


    </div>
    <!-- END SIDEBAR -->


    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">


        <!-- NAVBAR -->
        <header class="navbar-custom">

            <div class="navbar-left">

                <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
                        id="desktop-sidebar-toggle"
                        aria-label="Minimize Sidebar">

                    <i class="bi bi-chevron-bar-left"></i>

                </button>


                <button class="sidebar-toggle-btn me-2"
                        id="sidebar-toggle"
                        aria-label="Toggle Navigation">

                    <i class="bi bi-list"></i>

                </button>

            </div>


            <!-- SEARCH -->
            <div class="navbar-search-wrapper">

                <input type="text"
                       class="navbar-search-input"
                       placeholder="Cari..."
                       id="main-search">

                <button class="navbar-search-btn"
                        aria-label="Search">

                    <i class="bi bi-search"></i>

                </button>

            </div>


            <!-- NAVBAR ACTION -->
            <div class="navbar-actions">

                <!-- FULLSCREEN -->
                <button class="navbar-action-btn me-1"
                        aria-label="Toggle Fullscreen"
                        id="btn-fullscreen">

                    <i class="bi bi-arrows-fullscreen"></i>

                </button>


                <!-- NOTIFICATION -->
                <div class="dropdown">

                    <button class="navbar-action-btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                        <i class="bi bi-bell"></i>

                        <span class="navbar-action-badge"></span>

                    </button>


                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-notification p-0">

                        <div class="notification-header">

                            <h6 class="notification-title">
                                Notifikasi
                            </h6>

                        </div>


                        <div class="notification-list">

                            <div class="notification-item">

                                <div class="notification-icon bg-primary text-white">

                                    <i class="bi bi-info-circle"></i>

                                </div>


                                <div class="notification-content">

                                    <p class="notification-text">
                                        Selamat datang di Sistem Informasi Sekolah.
                                    </p>

                                    <span class="notification-time">
                                        Sekarang
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ADMIN PROFILE -->
                <div class="dropdown ms-2">

                    <button class="navbar-profile-btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                        <img src="{{ asset('assets/images/profil2.jpg') }}"
                             alt="Profile"
                             class="navbar-profile-img">

                        <span class="navbar-profile-name d-none d-md-inline">
                            {{ session('user_name', 'Administrator') }}
                        </span>

                        <i class="bi bi-chevron-down navbar-profile-caret"></i>

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile">

                        <li class="dropdown-header">
                            {{ session('user_name', 'Administrator') }}
                        </li>


                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person"></i>
                                Profil
                            </a>
                        </li>


                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i>
                                Pengaturan
                            </a>
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                    </ul>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <main class="main-content">

            @yield('content')

        </main>


        <!-- FOOTER -->
        <footer class="site-footer">
    <div class="text-center">
        <p class="fw-bold mb-1">
            SMKS YPC TASIKMALAYA
        </p>

        <small>
            &copy; 2026 Sistem Informasi Sekolah
        </small>
    </div>
</footer>

    </div>
    <!-- END MAIN WRAPPER -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/admin-delete.js') }}"></script>

</body>

</html>
