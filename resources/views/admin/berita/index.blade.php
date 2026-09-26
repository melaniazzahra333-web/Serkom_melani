@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-newspaper me-2"></i>
                Data Berita
            </h2>

            <p class="text-muted mb-0">
                Kelola berita dan informasi terbaru sekolah
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="btn btn-success px-3 py-2">

            <i class="fa-solid fa-plus me-1"></i>
            Tambah Berita

        </a>

    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        {{-- CARD HEADER --}}
        <div class="card-header bg-white border-0 px-4 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-1" style="color:#244D73;">
                        Daftar Berita
                    </h5>

                    <small class="text-muted">
                        Berita yang tersedia di website sekolah
                    </small>

                </div>

                <span
                    class="badge rounded-pill px-3 py-2"
                    style="background:#C8DFDB;color:#3368A0;"
                >
                    {{ $beritas->count() }} Berita
                </span>

            </div>

        </div>


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
                            Isi Berita
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

                    @forelse($beritas as $berita)

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
                                {{ $berita->judul }}
                            </div>

                        </td>


                        {{-- ISI --}}
                        <td>

                            <div
                                class="text-muted"
                                style="max-width:350px;"
                            >
                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($berita->isi),
                                    70
                                ) }}
                            </div>

                        </td>


                        {{-- TANGGAL --}}
                        <td>

                            <span class="text-muted">

                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}

                            </span>

                        </td>


                        {{-- STATUS --}}
                        <td>

                            @if($berita->status == 'Publish')

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


                        {{-- AKSI --}}
                        <td>

                            <div class="d-flex gap-2">

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('admin.berita.edit', ['id' => $berita->id_berita]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit"
                                >

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('admin.berita.destroy', ['id' => $berita->id_berita]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
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

                                <div class="mb-3">

                                    <i
                                        class="fa-solid fa-newspaper"
                                        style="font-size:40px;color:#66A3BF;"
                                    ></i>

                                </div>

                                <h6
                                    class="fw-bold"
                                    style="color:#244D73;"
                                >
                                    Belum ada berita
                                </h6>

                                <p class="text-muted small mb-0">
                                    Belum ada berita yang ditambahkan.
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
