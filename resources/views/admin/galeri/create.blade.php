@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2>
            <i class="fa-solid fa-images me-2"></i>
            Tambah Galeri
        </h2>
        <p class="text-muted mb-0">
            Tambahkan foto atau video kegiatan sekolah
        </p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Judul --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-heading me-1"></i>
                        Judul
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul') }}"
                           maxlength="50"
                           required>

                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                {{-- Keterangan --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-align-left me-1"></i>
                        Keterangan
                    </label>

                    <textarea name="keterangan" class="form-control" rows="4" required>{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                {{-- Kategori --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-layer-group me-1"></i>
                        Kategori
                    </label>

                    <select name="kategori" id="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Foto" {{ old('kategori') == 'Foto' ? 'selected' : '' }}>Foto</option>
                        <option value="Video" {{ old('kategori') == 'Video' ? 'selected' : '' }}>Video</option>
                    </select>

                    @error('kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                {{-- File Foto --}}
                <div class="mb-3" id="fotoInput">

                    <label class="form-label">
                        <i class="fa-solid fa-image me-1"></i>
                        Upload Foto
                    </label>

                    <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                    @error('file')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror

                </div>


                {{-- Link Video --}}
                <div class="mb-3" id="videoInput">

                    <label class="form-label">
                        <i class="fa-brands fa-youtube me-1"></i>
                        Link Video YouTube
                    </label>

                    <input type="url"
                           name="file"
                           class="form-control"
                           placeholder="https://www.youtube.com/watch?v=..."
                           value="{{ old('file') }}">

                    <small class="text-muted">
                        Masukkan link video YouTube.
                    </small>

                    @error('file')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- Tanggal --}}
                <div class="mb-4">

                    <label class="form-label">
                        <i class="fa-solid fa-calendar-days me-1"></i>
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}"
                           required>

                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                <button type="submit" class="btn btn-primary">

                    <i class="fa-solid fa-save me-1"></i>
                    Simpan

                </button>

                <a href="{{ route('admin.galeri') }}"
                   class="btn btn-secondary">

                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Kembali

                </a>

            </form>

        </div>
    </div>

</div>


<script>

    const kategori = document.getElementById('kategori');
    const fotoInput = document.getElementById('fotoInput');
    const videoInput = document.getElementById('videoInput');

    function tampilkanInput() {

        if (kategori.value === 'Foto') {

            fotoInput.style.display = 'block';
            videoInput.style.display = 'none';

        } else if (kategori.value === 'Video') {

            fotoInput.style.display = 'none';
            videoInput.style.display = 'block';

        } else {

            fotoInput.style.display = 'none';
            videoInput.style.display = 'none';

        }

    }

    kategori.addEventListener('change', tampilkanInput);

    tampilkanInput();

</script>

@endsection
