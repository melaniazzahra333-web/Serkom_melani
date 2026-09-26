@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Kelola Galeri</h2>
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


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Preview</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($galeris as $index => $galeri)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>


                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <img src="{{ asset('storage/' . $galeri->file) }}"
                                         width="100"
                                         height="70"
                                         style="object-fit: cover;"
                                         class="rounded">

                                @else

                                    <a href="{{ $galeri->file }}"
                                       target="_blank"
                                       class="btn btn-sm btn-danger">

                                        <i class="fa-brands fa-youtube me-1"></i>
                                        Lihat Video

                                    </a>

                                @endif

                            </td>


                            <td>
                                {{ $galeri->judul }}
                            </td>


                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <span class="badge bg-primary">
                                        Foto
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Video
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $galeri->tanggal }}
                            </td>


                            <td>

                                <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fa-solid fa-pen"></i>
                                    Edit

                                </a>


                                <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="fa-solid fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-4">

                                Belum ada data galeri.

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
