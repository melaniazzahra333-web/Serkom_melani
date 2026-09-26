@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-pen-to-square me-2"></i>
                Edit Pengumuman
            </h2>

            <p class="text-muted mb-0">
                Ubah informasi pengumuman
            </p>

        </div>

        <a
            href="{{ route('admin.pengumuman') }}"
            class="btn btn-secondary"
        >
            <i class="fa-solid fa-arrow-left me-1"></i>
            Kembali
        </a>

    </div>


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('admin.pengumuman.update', ['id' => $pengumuman->id_pengumuman]) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Judul Pengumuman
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul', $pengumuman->judul) }}"
                        maxlength="50"
                        required
                    >

                </div>


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-control"
                            value="{{ old('tanggal', $pengumuman->tanggal->format('Y-m-d')) }}"
                            required
                        >

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                            required
                        >

                            <option value="Publish"
                                {{ old('status', $pengumuman->status) == 'Publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="Draft"
                                {{ old('status', $pengumuman->status) == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                    </div>

                </div>


                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Isi Pengumuman
                    </label>

                    <textarea
                        name="isi"
                        class="form-control"
                        rows="7"
                        required
                    >{{ old('isi', $pengumuman->isi) }}</textarea>

                </div>


                <div class="text-end">

                    <a
                        href="{{ route('admin.pengumuman') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-success"
                    >

                        <i class="fa-solid fa-save me-1"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
