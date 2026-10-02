@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2>
            <i class="fa-solid fa-pen-to-square me-2"></i>
            Edit Galeri
        </h2>
        <p class="text-muted mb-0">
            Perbarui data foto atau video
        </p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- Judul --}}
                <div class="mb-3">

                    <label class="form-label">
                        <i class="fa-solid fa-heading me-1"></i>
                        Judul
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul', $galeri->judul) }}"
                           maxlength="50"
                           required>

                    @error('judul')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- Keterangan --}}
                <div class="mb-3">

                    <label class="form-label">
                        <i class="fa-solid fa-align-left me-1"></i>
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              class="form-control"
                              rows="4"
                              required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    @error('keterangan')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- Kategori --}}
                <div class="mb-3">

                    <label class="form-label">
                        <i class="fa-solid fa-layer-group me-1"></i>
                        Kategori
                    </label>

                    <select name="kategori"
                            id="kategori"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option value="Foto"
                            {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                            Foto
                        </option>

                        <option value="Video"
                            {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                            Video
                        </option>

                    </select>

                    @error('kategori')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- FOTO --}}
                <div class="mb-3" id="fotoInput">

                    <label class="form-label">
                        <i class="fa-solid fa-image me-1"></i>
                        Ganti Foto
                    </label>

                    @if($galeri->kategori == 'Foto' && $galeri->file)

                        <div class="mb-3">

                            <img src="{{ asset('storage/' . $galeri->file) }}"
                                 width="180"
                                 height="120"
                                 class="rounded"
                                 style="object-fit: cover;">

                        </div>

                    @endif

                    <input type="file"
                           name="file"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

                    @error('file')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- VIDEO --}}
                <div class="mb-3" id="videoInput">

                    <label class="form-label">
                        <i class="fa-brands fa-youtube me-1"></i>
                        Link Video YouTube
                    </label>

                    @if($galeri->kategori == 'Video')

                        <div class="mb-3">

                            <a href="{{ $galeri->file }}"
                               target="_blank"
                               class="btn btn-outline-danger btn-sm">

                                <i class="fa-brands fa-youtube me-1"></i>
                                Buka Video Saat Ini

                            </a>

                        </div>

                    @endif

                    <input type="url"
                           name="file"
                           class="form-control"
                           value="{{ $galeri->kategori == 'Video' ? old('file', $galeri->file) : '' }}"
                           placeholder="https://www.youtube.com/watch?v=...">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti link video.
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
                           value="{{ old('tanggal', $galeri->tanggal) }}"
                           required>

                    @error('tanggal')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    <i class="fa-solid fa-save me-1"></i>
                    Update

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
