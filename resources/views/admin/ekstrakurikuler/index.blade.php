@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Kelola Ekstrakurikuler</h2>

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
                            <th>Gambar</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Pembina</th>
                            <th>Jadwal Latihan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($ekstrakurikulers as $index => $ekstrakurikuler)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>


                            <td>

                                @if($ekstrakurikuler->gambar)

                                    <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                         width="90"
                                         height="65"
                                         class="rounded"
                                         style="object-fit: cover;">

                                @else

                                    -

                                @endif

                            </td>


                            <td>
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

                                <a href="{{ route('admin.ektrakurikuler.edit', $ekstrakurikuler->id_eskul) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fa-solid fa-pen"></i>
                                    Edit

                                </a>


                                <form action="{{ route('admin.ektrakurikuler.destroy', $ekstrakurikuler->id_eskul) }}"
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

                            <td colspan="7"
                                class="text-center py-4">

                                Belum ada data ekstrakurikuler.

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
