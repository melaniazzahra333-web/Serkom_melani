@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-images me-2"></i>
                Data Galeri
            </h2>

            <p class="text-muted mb-0">
                Kelola foto dan video kegiatan sekolah
            </p>
        </div>

        <a href="{{ route('admin.galeri.create') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-plus me-1"></i>
            Tambah Galeri

        </a>

    </div>


    {{-- NOTIFIKASI --}}
    @if(session('success'))

        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check me-1"></i>
            {{ session('success') }}
        </div>

    @endif


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            {{-- SEARCH + FILTER --}}
            <div class="d-flex align-items-center gap-2 p-3 border-bottom">

                <form
                    action="{{ route('admin.galeri') }}"
                    method="GET"
                    class="d-flex flex-grow-1 gap-2"
                >

                    {{-- SEARCH --}}
                    <div class="input-group flex-grow-1">

                        <span class="input-group-text bg-white">
                            <i class="fa-solid fa-magnifying-glass text-muted"></i>
                        </span>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari galeri..."
                            value="{{ $search ?? '' }}"
                        >

                    </div>


                    {{-- FILTER KATEGORI --}}
                    <select
                        name="kategori"
                        class="form-select"
                        style="width:180px;"
                    >

                        <option value="">
                            Semua Kategori
                        </option>

                        <option
                            value="Foto"
                            {{ ($kategori ?? '') == 'Foto' ? 'selected' : '' }}
                        >
                            Foto
                        </option>

                        <option
                            value="Video"
                            {{ ($kategori ?? '') == 'Video' ? 'selected' : '' }}
                        >
                            Video
                        </option>

                    </select>


                    {{-- CARI --}}
                    <button
                        type="submit"
                        class="btn btn-primary px-4"
                    >

                        <i class="fa-solid fa-magnifying-glass me-1"></i>
                        Cari

                    </button>


                    {{-- RESET --}}
                    @if(!empty($search) || !empty($kategori))

                        <a
                            href="{{ route('admin.galeri') }}"
                            class="btn btn-secondary"
                        >
                            <i class="fa-solid fa-rotate-left me-1"></i>
                            Reset
                        </a>

                    @endif

                </form>


                {{-- JUMLAH --}}
                <span
                    class="badge rounded-pill flex-shrink-0 px-3 py-2"
                    style="background:#C8DFDB;color:#3368A0;"
                >

                    <i class="fa-solid fa-images me-1"></i>

                    {{ $galeris->count() }} Galeri

                </span>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($galeris as $galeri)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- FOTO / VIDEO --}}
                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <img
                                        src="{{ asset('storage/' . $galeri->file) }}"
                                        width="100"
                                        height="100"
                                        style="object-fit: cover;"
                                        class="rounded"
                                        alt="Preview Galeri"
                                    >

                                @else

                                    <a
                                        href="{{ $galeri->file }}"
                                        target="_blank"
                                        class="btn btn-sm btn-danger"
                                    >

                                        <i class="fa-brands fa-youtube me-1"></i>
                                        Lihat Video

                                    </a>

                                @endif

                            </td>


                            {{-- JUDUL --}}
                            <td class="fw-semibold">

                                {{ $galeri->judul }}

                            </td>


                            {{-- KETERANGAN --}}
                            <td>

                                {{ $galeri->keterangan }}

                            </td>


                            {{-- KATEGORI --}}
                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <span class="badge bg-primary">

                                        <i class="fa-solid fa-image me-1"></i>
                                        Foto

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        <i class="fa-solid fa-video me-1"></i>
                                        Video

                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <i class="fa-solid fa-calendar-days me-1 text-muted"></i>

                                {{ $galeri->tanggal }}

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="d-flex gap-1">

                                    {{-- EDIT --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-warning"
                                        title="Edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editGaleri{{ $galeri->id_galeri }}"
                                    >

                                        <i class="fa-solid fa-pen"></i>

                                    </button>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                                        method="POST"
                                        class="form-hapus"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus"
                                        >

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                        @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center py-5"
                            >

                                <i
                                    class="fa-solid fa-images fs-1 text-secondary mb-3"
                                ></i>

                                <p class="text-muted mb-0">

                                    @if(!empty($search) || !empty($kategori))

                                        Data galeri tidak ditemukan.

                                    @else

                                        Belum ada data galeri.

                                    @endif

                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- MODAL EDIT --}}
    @foreach($galeris as $galeri)

        <div
            class="modal fade"
            id="editGaleri{{ $galeri->id_galeri }}"
            tabindex="-1"
            aria-labelledby="editGaleriLabel{{ $galeri->id_galeri }}"
            aria-hidden="true"
        >

            <div class="modal-dialog modal-dialog-centered modal-lg">

                <div class="modal-content border-0 shadow-lg rounded-4">


                    {{-- HEADER MODAL --}}
                    <div class="modal-header border-0">

                        <div>

                            <h5
                                class="modal-title fw-bold"
                                id="editGaleriLabel{{ $galeri->id_galeri }}"
                                style="color:#244D73;"
                            >

                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                Edit Galeri

                            </h5>

                            <p class="text-muted mb-0">
                                Perbarui data foto atau video
                            </p>

                        </div>


                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>

                    </div>


                    {{-- BODY MODAL --}}
                    <div class="modal-body">

                        <form
                            action="{{ route('admin.galeri.update', $galeri->id_galeri) }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf
                            @method('PUT')


                            {{-- Judul --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    <i class="fa-solid fa-heading me-1"></i>
                                    Judul

                                </label>

                                <input
                                    type="text"
                                    name="judul"
                                    class="form-control"
                                    value="{{ old('judul', $galeri->judul) }}"
                                    maxlength="50"
                                    required
                                >

                            </div>


                            {{-- Keterangan --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    <i class="fa-solid fa-align-left me-1"></i>
                                    Keterangan

                                </label>

                                <textarea
                                    name="keterangan"
                                    class="form-control"
                                    rows="4"
                                    required
                                >{{ old('keterangan', $galeri->keterangan) }}</textarea>

                            </div>


                            {{-- Kategori --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    <i class="fa-solid fa-layer-group me-1"></i>
                                    Kategori

                                </label>

                                <select
                                    name="kategori"
                                    class="form-select kategori-edit"
                                    data-id="{{ $galeri->id_galeri }}"
                                    required
                                >

                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>

                                    <option
                                        value="Foto"
                                        {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}
                                    >
                                        Foto
                                    </option>

                                    <option
                                        value="Video"
                                        {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}
                                    >
                                        Video
                                    </option>

                                </select>

                            </div>


                            {{-- FOTO --}}
                            <div
                                class="mb-3 fotoInputEdit{{ $galeri->id_galeri }}"
                            >

                                <label class="form-label">

                                    <i class="fa-solid fa-image me-1"></i>
                                    Ganti Foto

                                </label>


                                @if($galeri->kategori == 'Foto' && $galeri->file)

                                    <div class="mb-3">

                                        <img
                                            src="{{ asset('storage/' . $galeri->file) }}"
                                            width="180"
                                            height="120"
                                            class="rounded"
                                            style="object-fit: cover;"
                                        >

                                    </div>

                                @endif


                                <input
                                    type="file"
                                    name="file"
                                    class="form-control"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti foto.
                                </small>

                            </div>


                            {{-- VIDEO --}}
                            <div
                                class="mb-3 videoInputEdit{{ $galeri->id_galeri }}"
                            >

                                <label class="form-label">

                                    <i class="fa-brands fa-youtube me-1"></i>
                                    Link Video YouTube

                                </label>


                                @if($galeri->kategori == 'Video')

                                    <div class="mb-3">

                                        <a
                                            href="{{ $galeri->file }}"
                                            target="_blank"
                                            class="btn btn-outline-danger btn-sm"
                                        >

                                            <i class="fa-brands fa-youtube me-1"></i>
                                            Buka Video Saat Ini

                                        </a>

                                    </div>

                                @endif


                                <input
                                    type="url"
                                    name="file"
                                    class="form-control"
                                    value="{{ $galeri->kategori == 'Video' ? old('file', $galeri->file) : '' }}"
                                    placeholder="https://www.youtube.com/watch?v=..."
                                >

                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti link video.
                                </small>

                            </div>


                            {{-- Tanggal --}}
                            <div class="mb-4">

                                <label class="form-label">

                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                    Tanggal

                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control"
                                    value="{{ old('tanggal', $galeri->tanggal) }}"
                                    required
                                >

                            </div>


                            {{-- BUTTON --}}
                            <div class="text-end">

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

                                    <i class="fa-solid fa-save me-1"></i>
                                    Update

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>


@endsection
