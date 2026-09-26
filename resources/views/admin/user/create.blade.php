@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2>Tambah User</h2>
        <p class="text-muted">Tambahkan akun pengguna baru</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.user.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           value="{{ old('username') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>

                    <select name="role" class="form-select" required>

                        <option value="">-- Pilih Role --</option>

                        <option value="Admin">
                            Admin
                        </option>

                        <option value="Operator">
                            Operator
                        </option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-save me-1"></i>
                    Simpan
                </button>

                <a href="{{ route('admin.user') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
