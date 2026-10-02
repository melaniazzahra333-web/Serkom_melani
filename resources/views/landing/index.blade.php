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

            <a href="/login" class="btn btn-primary">
                    Login
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

                

            </div>
        </div>
    </nav>

    <!-- Gambar -->
    <img src="{{ asset('assets/images/nice.jpg') }}" class="banner" alt="SMK YPC Tasikmalaya">





    <footer style="background:#07579b; color:white;">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/images/logo_pn.png') }}" alt="Logo Sekolah" class="me-3" style=" width:55px; height:55px; object-fit:contain;">
                        <h4 class="fw-bold mb-0">SMK YPC TASIKMALAYA</h4>
                    </div>

                    <div class="d-flex align-items-start" style="gap:15px; line-height:1.7;">
                        <i class="fa-solid fa-location-dot" style="width:20px; margin-top:5px;"></i>

                        <span>Jl. Garut - Tasikmalaya, Cikunten Singaparna Tasikmalaya, Jawa Barat 46414</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div
                        class="d-flex align-items-center mb-3"
                        style="gap:15px;">

                        <i
                            class="fa-solid fa-envelope"
                            style="width:20px;"></i>

                        <a
                            href="mailto:smkypctasikmalaya@gmail.com"
                            style="color:white; text-decoration:none;">
                            smkypctasikmalaya@gmail.com
                        </a>
                    </div>

                    <div
                        class="d-flex align-items-center mb-3"
                        style="gap:15px;">

                        <i
                            class="fa-brands fa-whatsapp"
                            style="width:20px;"></i>

                        <a
                            href="https://api.whatsapp.com/send?phone=628112224563"
                            target="_blank"
                            style="color:white; text-decoration:none;">
                            08112224563
                        </a>

                    </div>

                    <div
                        class="d-flex align-items-center"
                        style="gap:15px;"
                    >

                        <i
                            class="fa-solid fa-phone"
                            style="width:20px;"
                        ></i>

                        <a
                            href="tel:0265-546717"
                            style="color:white; text-decoration:none;"
                        >
                            0265-546717
                        </a>

                    </div>

                </div>

            </div>

        </div>


    
        <div
            class="text-center py-3"
            style="
                border-top:1px solid rgba(255,255,255,0.2);
                font-size:14px;
            "
        >

            <strong>
                © 2026 SMK YPC TASIKMALAYA.
            </strong>

            Mencetak Generasi Siap Kerja, Siap Berkarya.

        </div>

    </footer>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>

