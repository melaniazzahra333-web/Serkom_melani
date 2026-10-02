@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">
                <i class="fa-solid fa-people-group me-2" style="color:#244D73;"></i>
                Edit Ekstrakurikuler
            </h2>

            <p class="text-muted mb-0">
                Perbarui data ekstrakurikuler
            </p>
        </div>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.ektrakurikuler.update', $ekstrakurikuler->id_eskul) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="row">

                    <!-- Nama -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            <i class="fa-solid fa-people-group me-1" style="color:#244D73;"></i>
                            Nama Ekstrakurikuler
                        </label>

                        <input type="text"
                               name="nama_eskul"
                               class="form-control"
                               value="{{ old('nama_eskul', $ekstrakurikuler->nama_eskul) }}"
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
                            <i class="fa-solid fa-user-tie me-1" style="color:#244D73;"></i>
                            Pembina
                        </label>

                        <input type="text"
                               name="pembina"
                               class="form-control"
                               value="{{ old('pembina', $ekstrakurikuler->pembina) }}"
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
                            <i class="fa-solid fa-calendar-days me-1" style="color:#244D73;"></i>
                            Jadwal Latihan
                        </label>

                        <input type="text"
                               name="jadwal_latihan"
                               class="form-control"
                               value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan) }}"
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
                            <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>
                            Ganti Gambar
                        </label>

                        <input type="file"
                               name="gambar"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar.
                        </small>

                        @error('gambar')
                            <small class="text-danger d-block">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Gambar Lama -->
                    <div class="col-12 mb-3">

                        <label class="form-label">
                            <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>
                            Gambar Saat Ini
                        </label>

                        <br>

                        @if($ekstrakurikuler->gambar)

                            <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                 width="180"
                                 height="120"
                                 class="rounded"
                                 style="object-fit:cover;">

                        @else

                            <p class="text-muted">
                                Tidak ada gambar.
                            </p>

                        @endif

                    </div>


                    <!-- Deskripsi -->
                    <div class="col-12 mb-3">

                        <label class="form-label">
                            <i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>
                            Deskripsi
                        </label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>


                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fa-solid fa-save me-1"></i>
                        Update

                    </button>

                    <a href="{{ route('admin.ektrakurikuler') }}"
                       class="btn btn-secondary">

                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
