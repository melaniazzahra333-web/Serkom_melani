@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Edit Profil Sekolah</h2>

            <p class="text-muted mb-0">
                Ubah informasi profil sekolah
            </p>
        </div>

        <a href="{{ route('admin.profil') }}" class="btn btn-secondary">
            Kembali
        </a>

    </div>


    <!-- CARD -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <!-- ERROR VALIDATION -->
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Data belum berhasil disimpan.
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- SUCCESS -->
            @if (session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- FORM -->
            <form
                action="{{ route('admin.profil.update', $profil->id_profil) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                <div class="row">


                    <!-- NAMA SEKOLAH -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
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


                    <!-- KEPALA SEKOLAH -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
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


                    <!-- NPSN -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
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


                    <!-- TAHUN BERDIRI -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
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


                    <!-- ALAMAT -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
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


                    <!-- KONTAK -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
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


                    <!-- VISI MISI -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
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


                    <!-- DESKRIPSI -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
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


                    <!-- FOTO SEKOLAH -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Foto Sekolah
                        </label>


                        @if($profil->foto)

                            <div class="mb-2">

                                <img
                                    src="{{ asset('storage/' . $profil->foto) }}"
                                    width="180"
                                    height="120"
                                    style="object-fit: cover;"
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


                    <!-- LOGO SEKOLAH -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Logo Sekolah
                        </label>


                        @if($profil->logo)

                            <div class="mb-2">

                                <img
                                    src="{{ asset('storage/' . $profil->logo) }}"
                                    width="100"
                                    height="100"
                                    style="object-fit: contain;"
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


                <!-- BUTTON -->
                <div class="text-end mt-3">

                    <a
                        href="{{ route('admin.profil') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>


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

@endsection
