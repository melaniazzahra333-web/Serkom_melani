@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Kelola User</h2>
            <p class="text-muted mb-0">Kelola akun pengguna sistem</p>
        </div>

        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i>
            Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($users as $index => $user)

                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
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
                                        Admin
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Operator
                                    </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.user.edit', $user->id_user) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.user.destroy', $user->id_user) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        <i class="fa-solid fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada data user.
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
