@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-people-group me-2"></i>
                Data Ekstrakurikuler
            </h2>

            <p class="text-muted mb-0">
                Kelola data kegiatan ekstrakurikuler sekolah
            </p>
        </div>

        <a href="{{ route('admin.ektrakurikuler.create') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-plus me-1"></i>
            Tambah Ekstrakurikuler

        </a>

    </div>


    {{-- NOTIFIKASI --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            {{-- HEADER CARD --}}
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">

                <div>
                    <h5 class="fw-bold mb-1" style="color:#244D73;">
                        Daftar Ekstrakurikuler
                    </h5>

                    <small class="text-muted">
                        Data kegiatan ekstrakurikuler yang tersedia
                    </small>
                </div>

                <span class="badge rounded-pill"
                      style="background:#C8DFDB;color:#3368A0;">

                    {{ $ekstrakurikulers->count() }} Ekstrakurikuler

                </span>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Pembina</th>
                            <th>Jadwal Latihan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($ekstrakurikulers as $ekstrakurikuler)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                @if($ekstrakurikuler->gambar)

                                    <img
                                        src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                        width="70"
                                        height="50"
                                        class="rounded"
                                        style="object-fit:cover;"
                                        alt="Gambar Ekstrakurikuler"
                                    >

                                @else

                                    <i class="fa-solid fa-image fs-4 text-secondary"></i>

                                @endif

                            </td>


                            <td class="fw-semibold">
                                {{ $ekstrakurikuler->nama_eskul }}
                            </td>


                            <td>
                                {{ $ekstrakurikuler->pembina }}
                            </td>


                            <td>
                                {{ $ekstrakurikuler->jadwal_latihan }}
                            </td>


                            <td>
                                {{ $ekstrakurikuler->deskripsi }}
                            </td>


                            <td>

                                <div class="d-flex gap-1">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('admin.ektrakurikuler.edit', $ekstrakurikuler->id_eskul) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.ektrakurikuler.destroy', $ekstrakurikuler->id_eskul) }}"
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

                                <i class="fa-solid fa-people-group fs-1 text-secondary mb-3"></i>

                                <p class="text-muted mb-0">
                                    Belum ada data ekstrakurikuler.
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
