@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Tambah Profil Sekolah</h2>
            <p class="text-muted mb-0">
                Tambahkan informasi profil sekolah
            </p>
        </div>

        <a href="{{ route('admin.profil') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.profil.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Sekolah</label>
                        <input
                            type="text"
                            name="nama_sekolah"
                            class="form-control"
                            value="{{ old('nama_sekolah') }}"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kepala Sekolah</label>
                        <input
                            type="text"
                            name="kepala_sekolah"
                            class="form-control"
                            value="{{ old('kepala_sekolah') }}"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NPSN</label>
                        <input
                            type="text"
                            name="npsn"
                            class="form-control"
                            value="{{ old('npsn') }}"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun Berdiri</label>
                        <input
                            type="number"
                            name="tahun_berdiri"
                            class="form-control"
                            value="{{ old('tahun_berdiri') }}"
                            required
                        >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            required
                        >{{ old('alamat') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Kontak</label>
                        <input
                            type="text"
                            name="kontak"
                            class="form-control"
                            value="{{ old('kontak') }}"
                            required
                        >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Visi & Misi</label>
                        <textarea
                            name="visi_misi"
                            class="form-control"
                            rows="5"
                            required
                        >{{ old('visi_misi') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="5"
                            required
                        >{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Foto Sekolah</label>
                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept=".jpg,.jpeg,.png"
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Logo Sekolah</label>
                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept=".jpg,.jpeg,.png"
                        >
                    </div>

                </div>

                <div class="text-end mt-3">

                    <a
                        href="{{ route('admin.profil') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i>
                        Simpan Profil
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
