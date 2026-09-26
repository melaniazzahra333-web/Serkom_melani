@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Tambah Ekstrakurikuler</h2>
            <p class="text-muted mb-0">
                Tambahkan data ekstrakurikuler sekolah
            </p>
        </div>

        <a href="{{ route('admin.ektrakurikuler') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.ektrakurikuler.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <div class="row">

                    <!-- Nama -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Ekstrakurikuler
                        </label>

                        <input type="text"
                               name="nama_eskul"
                               class="form-control"
                               value="{{ old('nama_eskul') }}"
                               placeholder="Contoh: Pramuka"
                               maxlength="40"
                               required>

                        @error('nama_eskul')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Pembina -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Pembina
                        </label>

                        <input type="text"
                               name="pembina"
                               class="form-control"
                               value="{{ old('pembina') }}"
                               placeholder="Nama pembina"
                               maxlength="40"
                               required>

                        @error('pembina')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Jadwal -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jadwal Latihan
                        </label>

                        <input type="text"
                               name="jadwal_latihan"
                               class="form-control"
                               value="{{ old('jadwal_latihan') }}"
                               placeholder="Contoh: Jumat, 14.00 - 16.00"
                               maxlength="40"
                               required>

                        @error('jadwal_latihan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Gambar -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gambar
                        </label>

                        <input type="file"
                               name="gambar"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp"
                               required>

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </small>

                        @error('gambar')
                            <small class="text-danger d-block">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Deskripsi -->
                    <div class="col-12 mb-3">

                        <label class="form-label">Deskripsi</label>

                        <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan deskripsi ekstrakurikuler" required>{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>


                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.ektrakurikuler') }}"
                       class="btn btn-secondary">

                        Batal

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fa-solid fa-save me-1"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
