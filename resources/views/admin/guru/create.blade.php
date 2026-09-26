@extends('layouts.admin')
@section('content')

<div class="container">
    <h2>Tambah Guru</h2>

    <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
            <label>Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control">
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control">
        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.guru')}}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
