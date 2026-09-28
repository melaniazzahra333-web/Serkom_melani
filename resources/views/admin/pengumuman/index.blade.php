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

        {{-- CARD HEADER --}}
        <div class="card-header bg-white border-0 px-4 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-1" style="color:#244D73;">
                        Daftar Pengumuman
                    </h5>

                    <small class="text-muted">
                        Pengumuman yang tersedia di website sekolah
                    </small>

                </div>


                <span
                    class="badge rounded-pill px-3 py-2"
                    style="background:#C8DFDB;color:#3368A0;"
                >
                    {{ $pengumuman->count() }} Pengumuman
                </span>

            </div>

        </div>


        {{-- ALERT --}}
        @if(session('success'))

            <div class="alert alert-success mx-4 mt-3 mb-0">
                <i class="fa-solid fa-circle-check me-1"></i>
                {{ session('success') }}
            </div>

        @endif


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

                        <td class="px-4">
                            {{ $loop->iteration }}
                        </td>


                        <td>

                            <div
                                class="fw-semibold"
                                style="color:#244D73;"
                            >
                                {{ $item->judul }}
                            </div>

                        </td>


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


                        <td>

                            <span class="text-muted">
                                {{ $item->tanggal->format('d M Y') }}
                            </span>

                        </td>


                        <td>

                            @if($item->status == 'Publish')

                                <span class="badge bg-success rounded-pill px-3 py-2">

                                    <i class="fa-solid fa-circle-check me-1"></i>
                                    Publish

                                </span>

                            @else

                                <span class="badge bg-secondary rounded-pill px-3 py-2">

                                    <i class="fa-solid fa-file me-1"></i>
                                    Draft

                                </span>

                            @endif

                        </td>


                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('admin.pengumuman.edit', ['id' => $item->id_pengumuman]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit"
                                >
                                    <i class="fa-solid fa-pen"></i>
                                </a>


                                <form
                                    action="{{ route('admin.pengumuman.destroy', ['id' => $item->id_pengumuman]) }}"
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
                                    style="font-size:40px;color:#66A3BF;"
                                ></i>

                                <h6
                                    class="fw-bold"
                                    style="color:#244D73;"
                                >
                                    Belum ada pengumuman
                                </h6>

                                <p class="text-muted small mb-0">
                                    Silakan tambahkan pengumuman terlebih dahulu.
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
