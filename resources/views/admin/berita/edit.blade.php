@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-pen-to-square me-2"></i>
                Edit Berita
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi berita sekolah
            </p>
        </div>

        <a href="{{ route('admin.berita') }}"
           class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Kembali
        </a>

    </div>


    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger border-0 shadow-sm">

            <div class="fw-semibold mb-2">
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                Terdapat kesalahan:
            </div>

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="mb-4">

                <h5 class="fw-bold mb-1" style="color:#244D73;">
                    <i class="fa-solid fa-newspaper me-1"></i>
                    Form Edit Berita
                </h5>

                <small class="text-muted">
                    Perbarui data berita sesuai informasi terbaru
                </small>

            </div>


            <form action="{{ route('admin.berita.update', $berita->id_berita) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-heading me-1" style="color:#244D73;"></i>
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul', $berita->judul) }}"
                           placeholder="Masukkan judul berita">

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              class="form-control"
                              rows="6"
                              placeholder="Tulis isi berita">{{ old('isi', $berita->isi) }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-calendar me-1" style="color:#244D73;"></i>
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal', $berita->tanggal) }}">

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>
                        Gambar Saat Ini
                    </label>


                    @if($berita->gambar)

                        <div class="p-3 border rounded bg-light">

                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 width="150"
                                 height="100"
                                 style="object-fit: cover;"
                                 class="rounded shadow-sm">

                        </div>

                    @else

                        <div class="text-muted small">
                            <i class="fa-solid fa-image me-1"></i>
                            Tidak ada gambar.
                        </div>

                    @endif

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>
                        Ganti Gambar
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>

                </div>


                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-toggle-on me-1" style="color:#244D73;"></i>
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="Publish"
                            {{ $berita->status == 'Publish' ? 'selected' : '' }}>
                            Publish
                        </option>

                        <option value="Draft"
                            {{ $berita->status == 'Draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                    </select>

                </div>


                <div class="border-top pt-3">

                    <button type="submit"
                            class="btn btn-success">
                        <i class="fa-solid fa-rotate me-1"></i>
                        Update
                    </button>

                    <a href="{{ route('admin.berita') }}"
                       class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>


            </form>

        </div>

    </div>

</div>

@endsection
