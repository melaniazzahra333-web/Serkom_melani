@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Profil Sekolah</h2>
            <p class="text-muted">Kelola informasi lengkap tentang sekolah</p>
        </div>

        <a href="{{ route('admin.profil.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Profil
        </a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @forelse($profils as $profil)

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">
            <h5>Data Profil Sekolah</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}"
                             width="100"
                             class="mb-3">
                    @endif

                    @if($profil->foto)
                        <img src="{{ asset('storage/' . $profil->foto) }}"
                             width="100%"
                             height="220"
                             style="object-fit: cover;"
                             class="rounded">
                    @endif

                    <h4 class="mt-3">
                        {{ $profil->nama_sekolah }}
                    </h4>

                </div>


                <div class="col-md-8">

                    <table class="table">

                        <tr>
                            <th>Nama Sekolah</th>
                            <td>{{ $profil->nama_sekolah }}</td>
                        </tr>

                        <tr>
                            <th>Kepala Sekolah</th>
                            <td>{{ $profil->kepala_sekolah }}</td>
                        </tr>

                        <tr>
                            <th>NPSN</th>
                            <td>{{ $profil->npsn }}</td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td>{{ $profil->alamat }}</td>
                        </tr>

                        <tr>
                            <th>Kontak</th>
                            <td>{{ $profil->kontak }}</td>
                        </tr>

                        <tr>
                            <th>Tahun Berdiri</th>
                            <td>{{ $profil->tahun_berdiri }}</td>
                        </tr>

                        <tr>
                            <th>Visi & Misi</th>
                            <td>{{ $profil->visi_misi }}</td>
                        </tr>

                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $profil->deskripsi }}</td>
                        </tr>

                    </table>


                    <div class="text-end">

                        <a href="{{ route('admin.profil.edit', $profil->id_profil) }}"
                           class="btn btn-warning">
                            <i class="fa fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('admin.profil.destroy', $profil->id_profil) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus profil ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @empty

        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">

                <i class="fa fa-school fa-3x text-muted mb-3"></i>

                <h4>Belum Ada Profil Sekolah</h4>

                <p class="text-muted">
                    Silakan tambahkan profil sekolah terlebih dahulu.
                </p>

                <a href="{{ route('admin.profil.create') }}"
                   class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Profil
                </a>

            </div>
        </div>

    @endforelse

</div>

@endsection
