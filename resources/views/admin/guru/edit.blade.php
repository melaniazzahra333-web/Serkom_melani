@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Edit Data Guru</h4>
            <p class="text-muted mb-0">Ubah data guru</p>
        </div>

        <a href="{{ route('admin.guru') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.guru.update', $guru->id_guru) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text"
                           name="nama_guru"
                           class="form-control"
                           value="{{ old('nama_guru', $guru->nama_guru) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text"
                           name="nip"
                           class="form-control"
                           value="{{ old('nip', $guru->nip) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text"
                           name="mapel"
                           class="form-control"
                           value="{{ old('mapel', $guru->mapel) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text"
                           name="jabatan"
                           class="form-control"
                           value="{{ old('jabatan', $guru->jabatan) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>

                    @if($guru->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 8px;">
                        </div>
                    @endif

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
