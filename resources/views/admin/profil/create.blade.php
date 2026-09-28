@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-school me-2"></i>
                Tambah Profil Sekolah
            </h2>

            <p class="text-muted mb-0">
                Tambahkan informasi profil sekolah
            </p>
        </div>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

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


            <form
                action="{{ route('admin.profil.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="row">

                    {{-- NAMA SEKOLAH --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Sekolah
                        </label>

                        <input
                            type="text"
                            name="nama_sekolah"
                            class="form-control"
                            value="{{ old('nama_sekolah') }}"
                            required
                        >

                    </div>


                    {{-- KEPALA SEKOLAH --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Kepala Sekolah
                        </label>

                        <input
                            type="text"
                            name="kepala_sekolah"
                            class="form-control"
                            value="{{ old('kepala_sekolah') }}"
                            required
                        >

                    </div>


                    {{-- NPSN --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            NPSN
                        </label>

                        <input
                            type="text"
                            name="npsn"
                            class="form-control"
                            value="{{ old('npsn') }}"
                            required
                        >

                    </div>


                    {{-- TAHUN BERDIRI --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tahun Berdiri
                        </label>

                        <input
                            type="number"
                            name="tahun_berdiri"
                            class="form-control"
                            value="{{ old('tahun_berdiri') }}"
                            required
                        >

                    </div>


                    {{-- ALAMAT --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            required
                        >{{ old('alamat') }}</textarea>

                    </div>


                    {{-- KONTAK --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Kontak
                        </label>

                        <input
                            type="text"
                            name="kontak"
                            class="form-control"
                            value="{{ old('kontak') }}"
                            required
                        >

                    </div>


                    {{-- VISI MISI --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Visi & Misi
                        </label>

                        <textarea
                            name="visi_misi"
                            class="form-control"
                            rows="5"
                            required
                        >{{ old('visi_misi') }}</textarea>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="5"
                            required
                        >{{ old('deskripsi') }}</textarea>

                    </div>


                    {{-- FOTO --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Foto Sekolah
                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </small>

                    </div>


                    {{-- LOGO --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Logo Sekolah
                        </label>

                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </small>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2 mt-3">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Simpan Profil

                    </button>

                    <a
                        href="{{ route('admin.profil') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
