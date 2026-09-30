@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-chalkboard-user me-2"></i>
                Edit Data Guru
            </h2>

            <p class="text-muted mb-0">
                Ubah data guru dan tenaga pendidik
            </p>
        </div>

    </div>


    {{-- FORM CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;">
                    Form Data Guru
                </h5>

                <small class="text-muted">
                    Silakan ubah data guru dengan lengkap
                </small>
            </div>


            <form action="{{ route('admin.guru.update', $guru->id_guru) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-user me-1" style="color:#244D73;"></i>
                        Nama Guru
                    </label>

                    <input type="text"
                           name="nama_guru"
                           class="form-control"
                           value="{{ old('nama_guru', $guru->nama_guru) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-id-card me-1" style="color:#244D73;"></i>
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           class="form-control"
                           value="{{ old('nip', $guru->nip) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-briefcase me-1" style="color:#244D73;"></i>
                        Jabatan
                    </label>

                    <select name="jabatan" class="form-select">

                        <option value="">Pilih Jabatan</option>

                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                        <option value="Wakasek">Wakasek</option>
                        <option value="Guru">Guru</option>
                        <option value="Staf Perpustakaan">Staf Perpustakaan</option>
                        <option value="Staf Administrasi">Staf Administrasi</option>
                        <option value="Bimbingan Konseling (BK)">Bimbingan Konseling (BK)</option>
                        <option value="Pembina Ektrakurikuler">Pembina Ekstrakurikuler</option>

                    </select>

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-book me-1" style="color:#244D73;"></i>
                        Mata Pelajaran
                    </label>

                    <input type="text"
                           name="mapel"
                           class="form-control"
                           value="{{ old('mapel', $guru->mapel) }}"
                           required>

                </div>


                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>
                        Foto
                    </label>

                    @if($guru->foto)

                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 8px;">
                        </div>

                    @endif

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">

                    <small class="text-muted">
                        Pilih foto baru jika ingin mengganti foto guru.
                    </small>

                </div>


                <div class="border-top pt-3">

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fa-solid fa-pen me-1"></i>
                        Update
                    </button>

                    <a href="{{ route('admin.guru') }}"
                       class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
