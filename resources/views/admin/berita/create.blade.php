@extends('layouts.admin')

@section('content')

<div class="container">

    <h2 class="mb-4">Tambah Berita</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Judul Berita</label>

            <input type="text"
                   name="judul"
                   class="form-control"
                   value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Berita</label>

            <textarea name="isi"
                      class="form-control"
                      rows="6">{{ old('isi') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>

            <input type="date"
                   name="tanggal"
                   class="form-control"
                   value="{{ old('tanggal') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label>

            <input type="file"
                   name="gambar"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>

            <select name="status" class="form-select">

                <option value="">-- Pilih Status --</option>

                <option value="Publish">
                    Publish
                </option>

                <option value="Draft">
                    Draft
                </option>

            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('admin.berita') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
