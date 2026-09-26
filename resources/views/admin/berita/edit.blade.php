@extends('layouts.admin')

@section('content')

<div class="container">

    <h2 class="mb-4">Edit Berita</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.update', $berita->id_berita) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Berita</label>

            <input type="text"
                   name="judul"
                   class="form-control"
                   value="{{ old('judul', $berita->judul) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Berita</label>

            <textarea name="isi"
                      class="form-control"
                      rows="6">{{ old('isi', $berita->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>

            <input type="date"
                   name="tanggal"
                   class="form-control"
                   value="{{ old('tanggal', $berita->tanggal) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label>

            @if($berita->gambar)

                <div class="mb-2">
                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         width="150"
                         height="100"
                         style="object-fit: cover;">
                </div>

            @else

                <p>Tidak ada gambar.</p>

            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Gambar</label>

            <input type="file"
                   name="gambar"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>

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

        <button type="submit" class="btn btn-success">
            Update
        </button>

        <a href="{{ route('admin.berita') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
