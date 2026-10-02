@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">
        <i class="fa-solid fa-user-plus me-2" style="color:#244D73;"></i>
        Tambah Siswa
    </h2>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.siswa.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-id-card me-1" style="color:#244D73;"></i>
                        NISN
                    </label>

                    <input type="text"
                           name="nisn"
                           class="form-control"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-user me-1" style="color:#244D73;"></i>
                        Nama Siswa
                    </label>

                    <input type="text"
                           name="nama_siswa"
                           class="form-control"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-venus-mars me-1" style="color:#244D73;"></i>
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
                        <i class="fa-solid fa-calendar me-1" style="color:#244D73;"></i>
                        Tahun Masuk
                    </label>

                    <input type="number"
                           name="tahun_masuk"
                           class="form-control"
                           required>
                </div>


                <button type="submit"
                        class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk me-1"></i>
                    Simpan
                </button>

                <a href="{{ route('admin.siswa') }}"
                   class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
