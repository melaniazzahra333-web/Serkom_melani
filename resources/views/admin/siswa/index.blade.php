@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-users me-2"></i>
                Data Siswa
            </h2>

            <p class="text-muted mb-0">
                Kelola data siswa sekolah
            </p>
        </div>

        {{-- TOMBOL TAMBAH HANYA UNTUK ADMIN --}}
        @if(session('user_role') === 'Admin')
            <a href="{{ route('admin.siswa.create') }}"
               class="btn btn-primary">

                <i class="fa-solid fa-plus me-1"></i>
                Tambah Siswa

            </a>
        @endif

    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">

                <div>

                    <h5 class="fw-bold mb-1" style="color:#244D73;">
                        Daftar Siswa
                    </h5>

                    <small class="text-muted">
                        Data siswa yang terdaftar
                    </small>

                </div>

                <div class="d-flex align-items-center gap-2">

                    {{-- SEARCH --}}
                    <form action="{{ route('admin.siswa') }}"
                        method="GET"
                        class="d-flex">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="fa-solid fa-magnifying-glass text-muted"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari siswa..."
                                value="{{ $search ?? '' }}"
                            >

                        </div>

                        @if(!empty($search))
                            <a href="{{ route('admin.siswa') }}"
                            class="btn btn-secondary ms-2">
                                Reset
                            </a>
                        @endif

                    </form>

                    {{-- JUMLAH DATA --}}
                    <span class="badge rounded-pill"
                        style="background:#C8DFDB;color:#3368A0;">
                        {{ $siswas->count() }} Siswa
                    </span>

                </div>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>

                            {{-- AKSI HANYA DITAMPILKAN UNTUK ADMIN --}}
                            @if(session('user_role') === 'Admin')
                                <th>Aksi</th>
                            @endif

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($siswas as $siswa)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>
                                {{ $siswa->nisn }}
                            </td>


                            <td class="fw-semibold">
                                {{ $siswa->nama_siswa }}
                            </td>


                            <td>

                                @if($siswa->jenis_kelamin == 'Laki-Laki')

                                    <span class="badge"
                                        style="background:#EEF5F4;color:#3368A0;">
                                        <i class="fa-solid fa-mars me-1"></i>
                                        Laki-Laki
                                    </span>

                                @elseif($siswa->jenis_kelamin == 'Perempuan')

                                    <span class="badge"
                                          style="background:#D45060;color:white;">
                                          <i class="fa-solid fa-venus me-1"></i>
                                        Perempuan
                                    </span>

                                @else

                                    {{ $siswa->jenis_kelamin }}

                                @endif

                            </td>


                            <td>
                                {{ $siswa->tahun_masuk }}
                            </td>


                            {{-- EDIT & HAPUS HANYA UNTUK ADMIN --}}
                            @if(session('user_role') === 'Admin')

                                <td>

                                    <div class="d-flex gap-1">

                                        {{-- EDIT --}}
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editSiswa{{ $siswa->id_siswa }}"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </button>


                                        {{-- HAPUS --}}
                                        <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                                method="POST"
                                                class="form-hapus">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                        </form>

                                    </div>

                                </td>

                            @endif

                        </tr>


                        {{-- MODAL EDIT SISWA --}}
                        @if(session('user_role') === 'Admin')

                        <div class="modal fade"
                             id="editSiswa{{ $siswa->id_siswa }}"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content border-0 shadow-lg"
                                     style="border-radius:15px;">

                                    <div class="modal-header">

                                        <h5 class="modal-title fw-bold"
                                            style="color:#244D73;">

                                            <i class="fa-solid fa-user-pen me-2"
                                               style="color:#244D73;"></i>

                                            Edit Siswa

                                        </h5>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal">
                                        </button>

                                    </div>


                                    <div class="modal-body">

                                        <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}"
                                              method="POST">

                                            @csrf

                                            @method('PUT')


                                            <div class="mb-3">

                                                <label class="form-label">

                                                    <i class="fa-solid fa-id-card me-1"
                                                       style="color:#244D73;"></i>

                                                    NISN

                                                </label>

                                                <input type="text"
                                                       name="nisn"
                                                       class="form-control"
                                                       value="{{ $siswa->nisn }}"
                                                       required>

                                            </div>


                                            <div class="mb-3">

                                                <label class="form-label">

                                                    <i class="fa-solid fa-user me-1"
                                                       style="color:#244D73;"></i>

                                                    Nama Siswa

                                                </label>

                                                <input type="text"
                                                       name="nama_siswa"
                                                       class="form-control"
                                                       value="{{ $siswa->nama_siswa }}"
                                                       required>

                                            </div>


                                            <div class="mb-3">

                                                <label class="form-label">

                                                    <i class="fa-solid fa-venus-mars me-1"
                                                       style="color:#244D73;"></i>

                                                    Jenis Kelamin

                                                </label>

                                                <select name="jenis_kelamin"
                                                        class="form-control"
                                                        required>

                                                    <option value="Laki-Laki"
                                                        {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                                        Laki-Laki
                                                    </option>

                                                    <option value="Perempuan"
                                                        {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>

                                                </select>

                                            </div>


                                            <div class="mb-3">

                                                <label class="form-label">

                                                    <i class="fa-solid fa-calendar me-1"
                                                       style="color:#244D73;"></i>

                                                    Tahun Masuk

                                                </label>

                                                <input type="number"
                                                       name="tahun_masuk"
                                                       class="form-control"
                                                       value="{{ $siswa->tahun_masuk }}"
                                                       required>

                                            </div>


                                            <div class="d-flex justify-content-end gap-2 mt-4">

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">

                                                    <i class="fa-solid fa-xmark me-1"></i>

                                                    Batal

                                                </button>

                                                <button type="submit"
                                                        class="btn btn-primary">

                                                    <i class="fa-solid fa-floppy-disk me-1"></i>

                                                    Update

                                                </button>

                                            </div>


                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                        @endif


                        @empty

                        <tr>

                            <td
                                colspan="{{ session('user_role') === 'Admin' ? 6 : 5 }}"
                                class="text-center py-5"
                            >

                                <i class="fa-solid fa-users fs-1 text-secondary mb-3"></i>

                                <p class="text-muted mb-0">
                                    Belum ada data siswa.
                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
