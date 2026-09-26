@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-clipboard-list me-2"></i>
                Tambah Pengumuman
            </h2>

            <p class="text-muted mb-0">
                Tambahkan pengumuman baru
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
                action="{{ route('admin.pengumuman.store') }}"
                method="POST"
            >

                @csrf


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Judul Pengumuman
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul') }}"
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
                            value="{{ old('tanggal') }}"
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

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option
                                value="Publish"
                                {{ old('status') == 'Publish' ? 'selected' : '' }}
                            >
                                Publish
                            </option>

                            <option
                                value="Draft"
                                {{ old('status') == 'Draft' ? 'selected' : '' }}
                            >
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
                    >{{ old('isi') }}</textarea>

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
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
