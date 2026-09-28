@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-school me-2"></i>
                Profil Sekolah
            </h2>

            <p class="text-muted mb-0">
                Kelola informasi lengkap tentang sekolah
            </p>
        </div>

        @if(!$profil)

            <a href="{{ route('admin.profil.create') }}"
               class="btn btn-primary">

                <i class="fa-solid fa-plus me-1"></i>
                Tambah Profil

            </a>

        @endif

    </div>


    {{-- NOTIFIKASI --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- DATA PROFIL --}}
    @if($profil)

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            {{-- HEADER CARD --}}
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">

                <div>
                    <h5 class="fw-bold mb-1" style="color:#244D73;">
                        Data Profil Sekolah
                    </h5>

                    <small class="text-muted">
                        Informasi lengkap mengenai sekolah
                    </small>
                </div>

                <span class="badge rounded-pill"
                      style="background:#C8DFDB;color:#3368A0;">

                    <i class="fa-solid fa-circle-info me-1"></i>
                    Profil Sekolah

                </span>

            </div>


            {{-- CONTENT --}}
            <div class="card-body">

                <div class="row g-4">

                    {{-- FOTO & LOGO --}}
                    <div class="col-md-4 text-center">

                        @if($profil->logo)

                            <div class="mb-3">

                                <img
                                    src="{{ asset('storage/' . $profil->logo) }}"
                                    width="100"
                                    height="100"
                                    style="object-fit:contain;"
                                    class="rounded"
                                    alt="Logo Sekolah"
                                >

                            </div>

                        @endif


                        @if($profil->foto)

                            <img
                                src="{{ asset('storage/' . $profil->foto) }}"
                                width="100%"
                                height="220"
                                style="object-fit:cover;"
                                class="rounded"
                                alt="Foto Sekolah"
                            >

                        @else

                            <div class="border rounded d-flex align-items-center justify-content-center"
                                 style="height:220px;background:#F8F9FA;">

                                <i class="fa-solid fa-school fs-1 text-secondary"></i>

                            </div>

                        @endif


                        <h4 class="fw-bold mt-3 mb-1" style="color:#244D73;">
                            {{ $profil->nama_sekolah }}
                        </h4>

                        <small class="text-muted">
                            Profil Sekolah
                        </small>

                    </div>


                    {{-- INFORMASI SEKOLAH --}}
                    <div class="col-md-8">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <tbody>

                                    <tr>
                                        <th style="width:35%;color:#244D73;">
                                            <i class="fa-solid fa-school me-2"></i>
                                            Nama Sekolah
                                        </th>

                                        <td>
                                            {{ $profil->nama_sekolah }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th style="color:#244D73;">
                                            <i class="fa-solid fa-user-tie me-2"></i>
                                            Kepala Sekolah
                                        </th>

                                        <td>
                                            {{ $profil->kepala_sekolah }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th style="color:#244D73;">
                                            <i class="fa-solid fa-id-card me-2"></i>
                                            NPSN
                                        </th>

                                        <td>
                                            {{ $profil->npsn }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th style="color:#244D73;">
                                            <i class="fa-solid fa-location-dot me-2"></i>
                                            Alamat
                                        </th>

                                        <td>
                                            {{ $profil->alamat }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th style="color:#244D73;">
                                            <i class="fa-solid fa-phone me-2"></i>
                                            Kontak
                                        </th>

                                        <td>
                                            {{ $profil->kontak }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th style="color:#244D73;">
                                            <i class="fa-solid fa-calendar me-2"></i>
                                            Tahun Berdiri
                                        </th>

                                        <td>
                                            {{ $profil->tahun_berdiri }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th style="color:#244D73;">
                                            <i class="fa-solid fa-eye me-2"></i>
                                            Visi & Misi
                                        </th>

                                        <td>
                                            {{ $profil->visi_misi }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th style="color:#244D73;">
                                            <i class="fa-solid fa-align-left me-2"></i>
                                            Deskripsi
                                        </th>

                                        <td>
                                            {{ $profil->deskripsi }}
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>


                        {{-- AKSI --}}
                        <div class="text-end mt-3">

                            <a href="{{ route('admin.profil.edit', $profil->id_profil) }}"
                               class="btn btn-warning">

                                <i class="fa-solid fa-pen me-1"></i>
                                Edit

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @else

        {{-- EMPTY STATE --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="fa-solid fa-school fs-1 text-secondary mb-3"></i>

                <h4 class="fw-bold" style="color:#244D73;">
                    Belum Ada Profil Sekolah
                </h4>

                <p class="text-muted">
                    Silakan tambahkan profil sekolah terlebih dahulu.
                </p>

                <a href="{{ route('admin.profil.create') }}"
                   class="btn btn-primary">

                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Profil

                </a>

            </div>

        </div>

    @endif

</div>

@endsection
