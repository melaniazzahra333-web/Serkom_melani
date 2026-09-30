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

            {{-- SEARCH + FILTER --}}
            <div class="d-flex align-items-center gap-2 p-3 border-bottom">

                <form
                    action="{{ route('admin.galeri') }}"
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
                            placeholder="Cari galeri..."
                            value="{{ $search ?? '' }}"
                        >

                    </div>


                    {{-- FILTER KATEGORI --}}
                    <select
                        name="kategori"
                        class="form-select"
                        style="width:180px;"
                    >

                        <option value="">
                            Semua Kategori
                        </option>

                        <option
                            value="Foto"
                            {{ ($kategori ?? '') == 'Foto' ? 'selected' : '' }}
                        >
                            Foto
                        </option>

                        <option
                            value="Video"
                            {{ ($kategori ?? '') == 'Video' ? 'selected' : '' }}
                        >
                            Video
                        </option>

                    </select>


                    {{-- CARI --}}
                    <button
                        type="submit"
                        class="btn btn-primary px-4"
                    >

                        <i class="fa-solid fa-magnifying-glass me-1"></i>
                        Cari

                    </button>


                    {{-- RESET --}}
                    @if(!empty($search) || !empty($kategori))

                        <a
                            href="{{ route('admin.galeri') }}"
                            class="btn btn-secondary"
                        >
                            Reset
                        </a>

                    @endif

                </form>


                {{-- JUMLAH --}}
                <span
                    class="badge rounded-pill flex-shrink-0 px-3 py-2"
                    style="background:#C8DFDB;color:#3368A0;"
                >

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

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- FOTO / VIDEO --}}
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

                                    <a
                                        href="{{ $galeri->file }}"
                                        target="_blank"
                                        class="btn btn-sm btn-danger"
                                    >

                                        <i class="fa-brands fa-youtube me-1"></i>
                                        Lihat Video

                                    </a>

                                @endif

                            </td>


                            {{-- JUDUL --}}
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


                            {{-- TANGGAL --}}
                            <td>

                                {{ $galeri->tanggal }}

                            </td>


                            {{-- AKSI --}}
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

                                <i
                                    class="fa-solid fa-images fs-1 text-secondary mb-3"
                                ></i>

                                <p class="text-muted mb-0">

                                    @if(!empty($search) || !empty($kategori))

                                        Data galeri tidak ditemukan.

                                    @else

                                        Belum ada data galeri.

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

@endsection
