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

                <span class="badge rounded-pill"
                      style="background:#C8DFDB;color:#3368A0;">
                    {{ $siswas->count() }} Siswa
                </span>

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
                                        <a
                                            href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </a>


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
