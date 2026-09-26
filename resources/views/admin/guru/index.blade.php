@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-chalkboard-user me-2"></i>
                Data Guru
            </h2>

            <p class="text-muted mb-0">
                Kelola data guru dan tenaga pendidik
            </p>
        </div>

        <a href="{{ route('admin.guru.create') }}"
           class="btn btn-success">

            <i class="fa-solid fa-plus me-1"></i>
            Tambah Guru

        </a>

    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">

                <div>
                    <h5 class="fw-bold mb-1" style="color:#244D73;">
                        Daftar Guru
                    </h5>

                    <small class="text-muted">
                        Data guru yang terdaftar
                    </small>
                </div>

                <span class="badge rounded-pill"
                      style="background:#C8DFDB;color:#3368A0;">
                    {{ $gurus->count() }} Guru
                </span>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($gurus as $guru)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                @if($guru->foto)

                                    <img
                                        src="{{ asset('storage/' . $guru->foto) }}"
                                        width="45"
                                        height="45"
                                        class="rounded"
                                        style="object-fit:cover;"
                                    >

                                @else

                                    <i class="fa-solid fa-user-circle fs-3 text-secondary"></i>

                                @endif

                            </td>


                            <td class="fw-semibold">

                                {{ $guru->nama_guru }}

                            </td>


                            <td>

                                {{ $guru->nip }}

                            </td>


                            <td>

                                <span class="badge"
                                      style="background:#EEF5F4;color:#3368A0;">

                                    {{ $guru->jabatan }}

                                </span>

                            </td>


                            <td>

                                {{ $guru->mapel }}

                            </td>


                            <td>

                                <div class="d-flex gap-1">

                                    <a
                                        href="{{ route('admin.guru.edit', ['id' => $guru->id_guru]) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.guru.destroy', ['id' => $guru->id_guru]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data guru ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <i class="fa-solid fa-users fs-1 text-secondary mb-3"></i>

                                <p class="text-muted mb-0">
                                    Belum ada data guru.
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
