@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Tambah Siswa</h2>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.siswa.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        NISN
                    </label>

                    <input type="text"
                           name="nisn"
                           class="form-control"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Nama Siswa
                    </label>

                    <input type="text"
                           name="nama_siswa"
                           class="form-control"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Jenis Kelamin
                    </label>

                    <select name="jenis_kelamin"
                            class="form-control"
                            required>

                        <option value="">
                            Pilih Jenis Kelamin
                        </option>

                        <option value="Laki-Laki">
                            Laki-Laki
                        </option>

                        <option value="Perempuan">
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
                           required>
                </div>


                <button type="submit"
                        class="btn btn-primary">
                    Simpan
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
