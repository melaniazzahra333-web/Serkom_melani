@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                <i class="fas fa-medal me-2"></i>
                Data Prestasi
            </h2>

            <p class="text-muted mb-0">
                Kelola data prestasi dan pencapaian sekolah
            </p>
        </div>

        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary px-4">
            <i class="fas fa-plus me-2"></i>
            Tambah Prestasi
        </a>
    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            {{-- JUDUL CARD --}}
            <div class="d-flex align-items-center mb-4">

                <div>
                    <h4 class="fw-bold mb-1">
                        Daftar Prestasi
                    </h4>

                    <p class="text-muted mb-0">
                        Prestasi yang dimiliki sekolah
                    </p>
                </div>

                <span class="badge rounded-pill ms-3"
                      style="
                        background-color: #d8ece8;
                        color: #2474a6;
                        padding: 8px 16px;
                      ">
                    {{ $prestasis->count() }} Prestasi
                </span>

            </div>


            {{-- PESAN SUKSES --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <i class="fas fa-check-circle me-2"></i>

                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- TABEL --}}
            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead>

                        <tr>

                            <th style="width: 70px;">
                                No
                            </th>

                            <th style="width: 180px;">
                                Foto
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th style="width: 160px;">
                                Tahun Ajaran
                            </th>

                            <th style="width: 150px; text-align: center;">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($prestasis as $prestasi)

                            <tr>

                                {{-- NO --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- FOTO --}}
                                <td>

                                    @if($prestasi->foto)

                                        <img
                                            src="{{ asset('storage/' . $prestasi->foto) }}"
                                            alt="Foto Prestasi"
                                            style="
                                                width: 120px;
                                                height: 80px;
                                                object-fit: cover;
                                                border-radius: 8px;
                                            "
                                        >

                                    @else

                                        <div
                                            style="
                                                width: 120px;
                                                height: 80px;
                                                border-radius: 8px;
                                                background: #f1f3f5;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                color: #999;
                                                font-size: 13px;
                                            "
                                        >
                                            Tidak ada foto
                                        </div>

                                    @endif

                                </td>


                                {{-- DESKRIPSI --}}
                                <td>

                                    <div style="max-width: 500px;">
                                        {{ $prestasi->deskripsi }}
                                    </div>

                                </td>


                                {{-- TAHUN AJARAN --}}
                                <td>

                                    {{ $prestasi->tahun_ajaran }}

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.prestasi.edit', $prestasi->id_prestasi) }}"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                        >

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.prestasi.destroy', $prestasi->id_prestasi) }}"
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

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5">

                                    <div class="text-center py-5">

                                        <i
                                            class="fas fa-medal mb-3"
                                            style="
                                                font-size: 42px;
                                                color: #66a3bf;
                                            "
                                        ></i>

                                        <h5 class="fw-bold mb-2">
                                            Belum ada prestasi
                                        </h5>

                                        <p class="text-muted mb-0">
                                            Silakan tambahkan data prestasi.
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

</div>

@endsection
