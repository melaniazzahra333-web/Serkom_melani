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
            <i class="fa-solid fa-circle-check me-2"></i>
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

                            <button
                                type="button"
                                class="btn btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editProfilModal"
                            >

                                <i class="fa-solid fa-pen me-1"></i>
                                Edit

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- MODAL EDIT PROFIL --}}
    <div class="modal fade"
         id="editProfilModal"
         tabindex="-1"
         aria-labelledby="editProfilModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-xl">

            <div class="modal-content border-0 shadow-lg"
                 style="border-radius:18px;">

                {{-- MODAL HEADER --}}
                <div class="modal-header border-0 px-4 pt-4">

                    <div>
                        <h5 class="modal-title fw-bold"
                            id="editProfilModalLabel"
                            style="color:#244D73;">

                            <i class="fa-solid fa-pen-to-square me-2"></i>
                            Edit Profil Sekolah

                        </h5>

                        <small class="text-muted">
                            Ubah informasi profil sekolah
                        </small>
                    </div>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>

                </div>


                {{-- MODAL BODY --}}
                <div class="modal-body px-4 pb-4">

                    {{-- ERROR VALIDATION --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                <i class="fa-solid fa-triangle-exclamation me-1"></i>
                                Data belum berhasil disimpan.
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        action="{{ route('admin.profil.update', $profil->id_profil) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf
                        @method('PUT')


                        <div class="row">

                            {{-- NAMA SEKOLAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-school me-1"></i>
                                    Nama Sekolah
                                </label>

                                <input
                                    type="text"
                                    name="nama_sekolah"
                                    class="form-control @error('nama_sekolah') is-invalid @enderror"
                                    value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                                    required
                                >

                                @error('nama_sekolah')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- KEPALA SEKOLAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-user-tie me-1"></i>
                                    Kepala Sekolah
                                </label>

                                <input
                                    type="text"
                                    name="kepala_sekolah"
                                    class="form-control @error('kepala_sekolah') is-invalid @enderror"
                                    value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}"
                                    required
                                >

                                @error('kepala_sekolah')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- NPSN --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-id-card me-1"></i>
                                    NPSN
                                </label>

                                <input
                                    type="text"
                                    name="npsn"
                                    class="form-control @error('npsn') is-invalid @enderror"
                                    value="{{ old('npsn', $profil->npsn) }}"
                                    required
                                >

                                @error('npsn')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- TAHUN BERDIRI --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-calendar me-1"></i>
                                    Tahun Berdiri
                                </label>

                                <input
                                    type="number"
                                    name="tahun_berdiri"
                                    class="form-control @error('tahun_berdiri') is-invalid @enderror"
                                    value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}"
                                    required
                                >

                                @error('tahun_berdiri')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- ALAMAT --}}
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-location-dot me-1"></i>
                                    Alamat
                                </label>

                                <textarea
                                    name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    rows="3"
                                    required
                                >{{ old('alamat', $profil->alamat) }}</textarea>

                                @error('alamat')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- KONTAK --}}
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-phone me-1"></i>
                                    Kontak
                                </label>

                                <input
                                    type="text"
                                    name="kontak"
                                    class="form-control @error('kontak') is-invalid @enderror"
                                    value="{{ old('kontak', $profil->kontak) }}"
                                    required
                                >

                                @error('kontak')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- VISI MISI --}}
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-eye me-1"></i>
                                    Visi & Misi
                                </label>

                                <textarea
                                    name="visi_misi"
                                    class="form-control @error('visi_misi') is-invalid @enderror"
                                    rows="5"
                                    required
                                >{{ old('visi_misi', $profil->visi_misi) }}</textarea>

                                @error('visi_misi')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- DESKRIPSI --}}
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-align-left me-1"></i>
                                    Deskripsi
                                </label>

                                <textarea
                                    name="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    rows="5"
                                    required
                                >{{ old('deskripsi', $profil->deskripsi) }}</textarea>

                                @error('deskripsi')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- FOTO SEKOLAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-image me-1"></i>
                                    Foto Sekolah
                                </label>

                                @if($profil->foto)

                                    <div class="mb-2">

                                        <img
                                            src="{{ asset('storage/' . $profil->foto) }}"
                                            width="180"
                                            height="120"
                                            style="object-fit:cover;"
                                            class="rounded border"
                                            alt="Foto Sekolah"
                                        >

                                    </div>

                                @endif

                                <input
                                    type="file"
                                    name="foto"
                                    class="form-control @error('foto') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                                @error('foto')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti foto.
                                </small>

                            </div>


                            {{-- LOGO SEKOLAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    <i class="fa-solid fa-image me-1"></i>
                                    Logo Sekolah
                                </label>

                                @if($profil->logo)

                                    <div class="mb-2">

                                        <img
                                            src="{{ asset('storage/' . $profil->logo) }}"
                                            width="100"
                                            height="100"
                                            style="object-fit:contain;"
                                            class="rounded border"
                                            alt="Logo Sekolah"
                                        >

                                    </div>

                                @endif

                                <input
                                    type="file"
                                    name="logo"
                                    class="form-control @error('logo') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                                @error('logo')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti logo.
                                </small>

                            </div>

                        </div>


                        {{-- BUTTON MODAL --}}
                        <div class="d-flex justify-content-end gap-2 mt-3">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >

                                <i class="fa-solid fa-xmark me-1"></i>
                                Batal

                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="fa-solid fa-floppy-disk me-1"></i>
                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

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
