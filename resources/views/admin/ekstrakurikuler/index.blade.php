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

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">


            {{-- SEARCH + JUMLAH DATA --}}
            <div class="d-flex align-items-center gap-2 mb-4 w-100">

                <form action="{{ route('admin.ektrakurikuler') }}"
                      method="GET"
                      class="d-flex flex-grow-1">

                    <div class="input-group w-100">

                        <span class="input-group-text bg-white">
                            <i class="fa-solid fa-magnifying-glass text-muted"></i>
                        </span>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari ekstrakurikuler..."
                            value="{{ $search ?? '' }}"
                        >

                    </div>


                    @if(!empty($search))

                        <a href="{{ route('admin.ektrakurikuler') }}"
                           class="btn btn-secondary ms-2">

                            Reset

                        </a>

                    @endif

                </form>


                {{-- JUMLAH EKSTRAKURIKULER --}}
                <span class="badge rounded-pill flex-shrink-0"
                      style="
                          background-color:#C8DFDB;
                          color:#3368A0;
                          padding:8px 16px;
                      ">

                    {{ $ekstrakurikulers->count() }} Ekstrakurikuler

                </span>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th style="width:60px;">No</th>
                            <th style="width:140px;">Gambar</th>
                            <th style="width:180px;">Nama Ekstrakurikuler</th>
                            <th style="width:150px;">Pembina</th>
                            <th style="width:160px;">Jadwal Latihan</th>
                            <th style="width:40%;">Deskripsi</th>
                            <th style="width:120px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>


                    <tbody>

                        @forelse($ekstrakurikulers as $ekstrakurikuler)

                            <tr>

                                {{-- NO --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- GAMBAR --}}
                                <td>

                                    @if($ekstrakurikuler->gambar)

                                        <img
                                            src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                            width="100"
                                            height="100"
                                            class="rounded"
                                            style="object-fit:cover;"
                                            alt="Gambar Ekstrakurikuler"
                                        >

                                    @else

                                        <i class="fa-solid fa-image fs-4 text-secondary"></i>

                                    @endif

                                </td>


                                {{-- NAMA --}}
                                <td class="fw-semibold">

                                    {{ $ekstrakurikuler->nama_eskul }}

                                </td>


                                {{-- PEMBINA --}}
                                <td>

                                    {{ $ekstrakurikuler->pembina }}

                                </td>


                                {{-- JADWAL --}}
                                <td>

                                    {{ $ekstrakurikuler->jadwal_latihan }}

                                </td>


                                {{-- DESKRIPSI --}}
                                <td>

                                    {{ $ekstrakurikuler->deskripsi }}

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
                                            data-bs-target="#editEskul{{ $ekstrakurikuler->id_eskul }}"
                                        >

                                            <i class="fa-solid fa-pen"></i>

                                        </button>


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

                                <td colspan="7"
                                    class="text-center py-5">

                                    <i class="fa-solid fa-people-group fs-1 text-secondary mb-3"></i>

                                    <p class="text-muted mb-0">
                                        @if(!empty($search))
                                            Data ekstrakurikuler tidak ditemukan.
                                        @else
                                            Belum ada data ekstrakurikuler.
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

</div>


{{-- ====================================================== --}}
{{-- MODAL EDIT EKSTRAKURIKULER --}}
{{-- ====================================================== --}}

@foreach($ekstrakurikulers as $ekstrakurikuler)

<div class="modal fade"
     id="editEskul{{ $ekstrakurikuler->id_eskul }}"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg"
             style="border-radius:16px;">

            {{-- HEADER MODAL --}}

            <div class="modal-header">

                <h5 class="modal-title fw-bold"
                    style="color:#244D73;">

                    <i class="fa-solid fa-people-group me-2"></i>

                    Edit Ekstrakurikuler

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>


            {{-- BODY MODAL --}}

            <div class="modal-body">

                <form
                    action="{{ route('admin.ektrakurikuler.update', $ekstrakurikuler->id_eskul) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf

                    @method('PUT')


                    {{-- NAMA --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            <i class="fa-solid fa-people-group me-1"
                               style="color:#244D73;"></i>

                            Nama Ekstrakurikuler

                        </label>

                        <input
                            type="text"
                            name="nama_eskul"
                            class="form-control"
                            value="{{ $ekstrakurikuler->nama_eskul }}"
                            maxlength="40"
                            required
                        >

                    </div>


                    {{-- PEMBINA --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            <i class="fa-solid fa-user-tie me-1"
                               style="color:#244D73;"></i>

                            Pembina

                        </label>

                        <input
                            type="text"
                            name="pembina"
                            class="form-control"
                            value="{{ $ekstrakurikuler->pembina }}"
                            maxlength="40"
                            required
                        >

                    </div>


                    {{-- JADWAL --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            <i class="fa-solid fa-calendar-days me-1"
                               style="color:#244D73;"></i>

                            Jadwal Latihan

                        </label>

                        <input
                            type="text"
                            name="jadwal_latihan"
                            class="form-control"
                            value="{{ $ekstrakurikuler->jadwal_latihan }}"
                            maxlength="40"
                            required
                        >

                    </div>


                    {{-- GAMBAR --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            <i class="fa-solid fa-image me-1"
                               style="color:#244D73;"></i>

                            Ganti Gambar

                        </label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="text-muted">

                            Kosongkan jika tidak ingin mengganti gambar.

                        </small>

                    </div>


                    {{-- GAMBAR SAAT INI --}}

                    @if($ekstrakurikuler->gambar)

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Gambar Saat Ini

                            </label>

                            <br>

                            <img
                                src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                width="180"
                                height="120"
                                class="rounded"
                                style="object-fit:cover;"
                                alt="Gambar Ekstrakurikuler"
                            >

                        </div>

                    @endif


                    {{-- DESKRIPSI --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="fa-solid fa-align-left me-1"
                               style="color:#244D73;"></i>

                            Deskripsi

                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="4"
                            required
                        >{{ $ekstrakurikuler->deskripsi }}</textarea>

                    </div>


                    {{-- BUTTON --}}

                    <div class="d-flex justify-content-end gap-2">

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

                            Simpan Perubahan

                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

@endforeach

@endsection
