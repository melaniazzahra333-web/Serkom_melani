@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-clipboard-list me-2"></i>
                Data Pengumuman
            </h2>

            <p class="text-muted mb-0">
                Kelola pengumuman dan informasi sekolah
            </p>

        </div>


        <a
            href="{{ route('admin.pengumuman.create') }}"
            class="btn btn-primary px-3 py-2"
        >

            <i class="fa-solid fa-plus me-1"></i>
            Tambah Pengumuman

        </a>

    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


        {{-- SEARCH + FILTER STATUS + JUMLAH --}}
        <div class="card-header bg-white border-0 px-4 py-3">

            <div class="d-flex align-items-center gap-2 w-100">

                <form
                    action="{{ route('admin.pengumuman') }}"
                    method="GET"
                    class="d-flex flex-grow-1 gap-2"
                >

                    {{-- SEARCH --}}
                    <div class="input-group flex-grow-1">

                        <span class="input-group-text bg-white">
                            <i class="fa-solid fa-magnifying-glass text-muted"></i>
                        </span>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari pengumuman..."
                            value="{{ $search ?? '' }}"
                        >

                    </div>


                    {{-- FILTER STATUS --}}
                    <select
                        name="status"
                        class="form-select"
                        style="width:180px;"
                    >

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="Publish"
                            {{ ($status ?? '') == 'Publish' ? 'selected' : '' }}
                        >
                            Publish
                        </option>

                        <option
                            value="Draft"
                            {{ ($status ?? '') == 'Draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                    </select>


                    {{-- TOMBOL CARI --}}
                    <button
                        type="submit"
                        class="btn btn-primary px-4"
                    >

                        <i class="fa-solid fa-magnifying-glass me-1"></i>
                        Cari

                    </button>


                    {{-- RESET --}}
                    @if(!empty($search) || !empty($status))

                        <a
                            href="{{ route('admin.pengumuman') }}"
                            class="btn btn-secondary"
                        >
                            <i class="fa-solid fa-rotate-left me-1"></i>
                            Reset
                        </a>

                    @endif

                </form>


                {{-- JUMLAH PENGUMUMAN --}}
                <span
                    class="badge rounded-pill flex-shrink-0 px-3 py-2"
                    style="background:#C8DFDB;color:#3368A0;"
                >

                    <i class="fa-solid fa-clipboard-list me-1"></i>

                    {{ $pengumuman->count() }} Pengumuman

                </span>

            </div>

        </div>


        {{-- ALERT SUCCESS --}}
        @if(session('success'))

            <div class="alert alert-success mx-4 mt-3 mb-0">

                <i class="fa-solid fa-circle-check me-1"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- ALERT ERROR --}}
        @if(session('error'))

            <div class="alert alert-danger mx-4 mt-3 mb-0">

                <i class="fa-solid fa-circle-exclamation me-1"></i>

                {{ session('error') }}

            </div>

        @endif


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr style="background:#F5F8F7;">

                        <th class="px-4 py-3 text-muted small">
                            No
                        </th>

                        <th class="py-3 text-muted small">
                            Judul
                        </th>

                        <th class="py-3 text-muted small">
                            Isi Pengumuman
                        </th>

                        <th class="py-3 text-muted small">
                            Tanggal
                        </th>

                        <th class="py-3 text-muted small">
                            Status
                        </th>

                        <th class="py-3 text-muted small">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($pengumuman as $item)

                        <tr>

                            {{-- NO --}}
                            <td class="px-4">

                                {{ $loop->iteration }}

                            </td>


                            {{-- JUDUL --}}
                            <td>

                                <div
                                    class="fw-semibold"
                                    style="color:#244D73;"
                                >

                                    {{ $item->judul }}

                                </div>

                            </td>


                            {{-- ISI --}}
                            <td>

                                <div
                                    class="text-muted"
                                    style="max-width:400px;"
                                >

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->isi),
                                        80
                                    ) }}

                                </div>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <span class="text-muted">

                                    <i class="fa-solid fa-calendar-days me-1"></i>

                                    {{ $item->tanggal->format('d M Y') }}

                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($item->status == 'Publish')

                                    <span
                                        class="badge bg-success rounded-pill px-3 py-2"
                                    >

                                        <i class="fa-solid fa-circle-check me-1"></i>

                                        Publish

                                    </span>

                                @else

                                    <span
                                        class="badge bg-secondary rounded-pill px-3 py-2"
                                    >

                                        <i class="fa-solid fa-file me-1"></i>

                                        Draft

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="d-flex gap-2">


                                    {{-- EDIT --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-warning"
                                        title="Edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editPengumuman{{ $item->id_pengumuman }}"
                                    >

                                        <i class="fa-solid fa-pen"></i>

                                    </button>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route(
                                            'admin.pengumuman.destroy',
                                            ['id' => $item->id_pengumuman]
                                        ) }}"
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

                            <td colspan="6">

                                <div class="text-center py-5">

                                    <i
                                        class="fa-solid fa-clipboard-list mb-3"
                                        style="
                                            font-size:40px;
                                            color:#66A3BF;
                                        "
                                    ></i>


                                    <h6
                                        class="fw-bold"
                                        style="color:#244D73;"
                                    >

                                        @if(!empty($search) || !empty($status))

                                            Data pengumuman tidak ditemukan

                                        @else

                                            Belum ada pengumuman

                                        @endif

                                    </h6>


                                    <p class="text-muted small mb-0">

                                        @if(!empty($search) || !empty($status))

                                            Coba ubah kata pencarian atau status.

                                        @else

                                            Silakan tambahkan pengumuman terlebih dahulu.

                                        @endif

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- MODAL EDIT --}}
    @foreach($pengumuman as $item)

        <div
            class="modal fade"
            id="editPengumuman{{ $item->id_pengumuman }}"
            tabindex="-1"
            aria-labelledby="editPengumumanLabel{{ $item->id_pengumuman }}"
            aria-hidden="true"
        >

            <div class="modal-dialog modal-dialog-centered modal-lg">

                <div
                    class="modal-content border-0 shadow-lg rounded-4"
                >

                    {{-- HEADER MODAL --}}
                    <div class="modal-header border-0 px-4 pt-4">

                        <div>

                            <h5
                                class="modal-title fw-bold"
                                id="editPengumumanLabel{{ $item->id_pengumuman }}"
                                style="color:#244D73;"
                            >

                                <i class="fa-solid fa-pen-to-square me-2"></i>

                                Edit Pengumuman

                            </h5>

                            <p class="text-muted mb-0">
                                Ubah informasi pengumuman
                            </p>

                        </div>


                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>

                    </div>


                    {{-- BODY MODAL --}}
                    <div class="modal-body px-4 pb-4">


                        <form
                            action="{{ route(
                                'admin.pengumuman.update',
                                ['id' => $item->id_pengumuman]
                            ) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')


                            {{-- JUDUL --}}
                            <div class="mb-3">

                                <label class="form-label fw-semibold">

                                    <i class="fa-solid fa-heading me-1"></i>

                                    Judul Pengumuman

                                </label>

                                <input
                                    type="text"
                                    name="judul"
                                    class="form-control"
                                    value="{{ old('judul', $item->judul) }}"
                                    maxlength="50"
                                    required
                                >

                            </div>


                            {{-- TANGGAL + STATUS --}}
                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">

                                        <i class="fa-solid fa-calendar-days me-1"></i>

                                        Tanggal

                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal"
                                        class="form-control"
                                        value="{{ old('tanggal', $item->tanggal->format('Y-m-d')) }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">

                                        <i class="fa-solid fa-circle-info me-1"></i>

                                        Status

                                    </label>

                                    <select
                                        name="status"
                                        class="form-select"
                                        required
                                    >

                                        <option
                                            value="Publish"
                                            {{ old('status', $item->status) == 'Publish' ? 'selected' : '' }}
                                        >
                                            Publish
                                        </option>

                                        <option
                                            value="Draft"
                                            {{ old('status', $item->status) == 'Draft' ? 'selected' : '' }}
                                        >
                                            Draft
                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- ISI --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    <i class="fa-solid fa-align-left me-1"></i>

                                    Isi Pengumuman

                                </label>

                                <textarea
                                    name="isi"
                                    class="form-control"
                                    rows="7"
                                    required
                                >{{ old('isi', $item->isi) }}</textarea>

                            </div>


                            {{-- BUTTON --}}
                            <div class="text-end">

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
                                    class="btn btn-success"
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

</div>

@endsection
