@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1" style="color:#244D73;">
            <i class="fa-solid fa-user me-2"></i>
            Profil Pengguna
        </h2>

        <p class="text-muted mb-0">
            Informasi akun pengguna yang sedang login
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="text-center mb-4">

                <div class="mb-3">
                    <i class="fa-solid fa-circle-user fa-6x text-secondary"></i>
                </div>

                <h4 class="fw-bold mb-1">
                    {{ $user->name }}
                </h4>

                <p class="text-muted mb-0">
                    {{ $user->role }}
                </p>

            </div>

            <div class="mb-3">
                <label class="fw-semibold">Nama</label>
                <p class="mb-0">{{ $user->name }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Username</label>
                <p class="mb-0">{{ $user->username }}</p>
            </div>

            <div class="mb-4">
                <label class="fw-semibold">Role</label>
                <p class="mb-0">{{ $user->role }}</p>
            </div>

            <a href="{{ route('admin.user.profile.edit') }}" class="btn btn-primary">
                <i class="fa-solid fa-pen-to-square me-1"></i>
                Edit Profil
            </a>

        </div>
    </div>

</div>

@endsection
