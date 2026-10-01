<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMK YPC Tasikmalaya</title>

    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>

    <nav class="navbar bg-white">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('assets/images/logo.png') }}" class="logo me-3" alt="Logo">

                <span class="fw-bold">
                    SMK YPC TASIKMALAYA
                </span>
            </a>
        </div>
    </nav>

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-home"></i>Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fas fa-newspaper"></i>Informasi</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">Berita</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">Pengumuman</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-graduation-cap"></i>Program</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-chalkboard-teacher"></i>Staf & Guru</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog"></i> Fasilitas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users"></i> Ektrakurikuler</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-images"></i> Foto & Video</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-building"></i> Profil Sekolah</a>
                    </li>
                </ul>

                <a href="/login" class="btn btn-primary">
                    Login
                </a>

            </div>
        </div>
    </nav>

    <!-- Gambar -->
    <img src="{{ asset('assets/images/nice.jpg') }}" class="banner" alt="SMK YPC Tasikmalaya">

        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>

