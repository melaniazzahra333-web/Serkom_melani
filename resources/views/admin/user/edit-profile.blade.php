@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1" style="color:#244D73;">
            <i class="fa-solid fa-user-pen me-2"></i>
            Edit Profil
        </h2>

        <p class="text-muted mb-0">
            Ubah informasi akun pengguna
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Foto Profil
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept="image/*"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        value="{{ old('username', $user->username) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengganti password"
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Role
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $user->role }}"
                        readonly
                    >
                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.user.profile') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>
</div>

@endsection
