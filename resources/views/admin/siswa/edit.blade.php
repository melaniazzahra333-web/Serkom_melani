@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Edit Siswa</h2>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}"
                  method="POST">

                @csrf

                @method('PUT')


                <div class="mb-3">
                    <label class="form-label">
                        NISN
                    </label>

                    <input type="text"
                           name="nisn"
                           class="form-control"
                           value="{{ $siswa->nisn }}"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Nama Siswa
                    </label>

                    <input type="text"
                           name="nama_siswa"
                           class="form-control"
                           value="{{ $siswa->nama_siswa }}"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Jenis Kelamin
                    </label>

                    <select name="jenis_kelamin"
                            class="form-control"
                            required>

                        <option value="Laki-Laki"
                            {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>

                        <option value="Perempuan"
                            {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Tahun Masuk
                    </label>

                    <input type="number"
                           name="tahun_masuk"
                           class="form-control"
                           value="{{ $siswa->tahun_masuk }}"
                           required>
                </div>


                <button type="submit"
                        class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('admin.siswa') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
