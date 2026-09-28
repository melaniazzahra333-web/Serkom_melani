@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-images me-2"></i>
                Data Galeri
            </h2>

            <p class="text-muted mb-0">
                Kelola foto dan video kegiatan sekolah
            </p>
        </div>

        <a href="{{ route('admin.galeri.create') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-plus me-1"></i>
            Tambah Galeri

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
                        Daftar Galeri
                    </h5>

                    <small class="text-muted">
                        Foto dan video kegiatan sekolah
                    </small>
                </div>

                <span class="badge rounded-pill"
                      style="background:#C8DFDB;color:#3368A0;">

                    {{ $galeris->count() }} Galeri

                </span>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($galeris as $galeri)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <img
                                        src="{{ asset('storage/' . $galeri->file) }}"
                                        width="90"
                                        height="60"
                                        style="object-fit: cover;"
                                        class="rounded"
                                        alt="Preview Galeri"
                                    >

                                @else

                                    <a href="{{ $galeri->file }}"
                                       target="_blank"
                                       class="btn btn-sm btn-danger">

                                        <i class="fa-brands fa-youtube me-1"></i>
                                        Lihat Video

                                    </a>

                                @endif

                            </td>


                            <td class="fw-semibold">
                                {{ $galeri->judul }}
                            </td>


                            {{-- KETERANGAN --}}
                            <td>
                                {{ $galeri->keterangan }}
                            </td>


                            {{-- KATEGORI --}}
                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <span class="badge bg-primary">
                                        <i class="fa-solid fa-image me-1"></i>
                                        Foto
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        <i class="fa-solid fa-video me-1"></i>
                                        Video
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $galeri->tanggal }}
                            </td>


                            <td>

                                <div class="d-flex gap-1">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
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

                                <i class="fa-solid fa-images fs-1 text-secondary mb-3"></i>

                                <p class="text-muted mb-0">
                                    Belum ada data galeri.
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
