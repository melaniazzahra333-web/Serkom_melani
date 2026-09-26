@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Siswa</h2>

        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
            Tambah Siswa
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($siswas as $index => $siswa)

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $siswa->nisn }}
                        </td>

                        <td>
                            {{ $siswa->nama_siswa }}
                        </td>

                        <td>
                            {{ $siswa->jenis_kelamin }}
                        </td>

                        <td>
                            {{ $siswa->tahun_masuk }}
                        </td>

                        <td>

                            <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
