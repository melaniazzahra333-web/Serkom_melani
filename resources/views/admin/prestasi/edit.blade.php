@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Edit Prestasi</h4>
            <p class="text-muted mb-0">Perbarui data prestasi sekolah</p>
        </div>

        <a href="{{ route('admin.prestasi') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.prestasi.update', $prestasi->id_prestasi) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Deskripsi Prestasi
                    </label>

                    <textarea
                        name="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        rows="5">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tahun Ajaran
                    </label>

                    <input
                        type="text"
                        name="tahun_ajaran"
                        class="form-control @error('tahun_ajaran') is-invalid @enderror"
                        value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}">

                    @error('tahun_ajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Foto Prestasi
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept="image/*">

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @if($prestasi->foto)
                    <div class="mb-4">
                        <p class="fw-semibold mb-2">Foto Saat Ini:</p>

                        <img
                            src="{{ asset('storage/' . $prestasi->foto) }}"
                            alt="Foto Prestasi"
                            style="width: 180px; height: 120px; object-fit: cover; border-radius: 8px;">
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>
                    Simpan Perubahan
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
