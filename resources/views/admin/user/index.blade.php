@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-users-gear me-2"></i>
                Kelola User
            </h2>

            <p class="text-muted mb-0">
                Kelola akun pengguna sistem
            </p>

        </div>


        {{-- TAMBAH USER HANYA ADMIN --}}
        @if(session('user_role') === 'Admin')

            <a href="{{ route('admin.user.create') }}"
               class="btn btn-primary">

                <i class="fa-solid fa-plus me-1"></i>
                Tambah User

            </a>

        @endif

    </div>


    {{-- PESAN SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            {{-- HEADER CARD --}}
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">

                <div>

                    <h5 class="fw-bold mb-1" style="color:#244D73;">
                        Daftar User
                    </h5>

                    <small class="text-muted">
                        Pengguna yang terdaftar dalam sistem
                    </small>

                </div>


                <span class="badge rounded-pill"
                      style="background:#C8DFDB;color:#3368A0;">

                    {{ $users->count() }} User

                </span>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>

                            {{-- AKSI HANYA ADMIN --}}
                            @if(session('user_role') === 'Admin')
                                <th>Aksi</th>
                            @endif

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($users as $index => $user)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>


                            <td class="fw-semibold">
                                {{ $user->name }}
                            </td>


                            <td>
                                {{ $user->username }}
                            </td>


                            <td>

                                <span class="text-muted">
                                    ********
                                </span>

                            </td>


                            <td>

                                @if($user->role == 'Admin')

                                    <span class="badge bg-primary">
                                        <i class="fa-solid fa-user-shield me-1"></i>
                                        Admin
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        <i class="fa-solid fa-user me-1"></i>
                                        Operator
                                    </span>

                                @endif

                            </td>


                            {{-- EDIT & HAPUS HANYA ADMIN --}}
                            @if(session('user_role') === 'Admin')

                                <td>

                                    <div class="d-flex gap-1">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.user.edit', $user->id_user) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit"
                                        >

                                            <i class="fa-solid fa-pen"></i>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.user.destroy', $user->id_user) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus"
                                            >

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            @endif

                        </tr>


                        @empty

                        <tr>

                            <td
                                colspan="{{ session('user_role') === 'Admin' ? 6 : 5 }}"
                                class="text-center py-5"
                            >

                                <i class="fa-solid fa-users fs-1 text-secondary mb-3"></i>

                                <p class="text-muted mb-0">
                                    Belum ada data user.
                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection