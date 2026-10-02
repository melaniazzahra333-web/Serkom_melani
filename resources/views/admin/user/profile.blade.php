@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4 text-center">
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

    <div class="card border-0 shadow-sm mx-auto"
         style="max-width:760px; border-radius:18px;">

        <div class="card-body px-5 py-5">

            <!-- FOTO -->
            <div class="text-center">

                <div class="position-relative d-inline-block mb-3">

                    @if($user->foto)

                        <img
                            src="{{ asset('storage/' . $user->foto) }}"
                            alt="Foto Profil"
                            class="rounded-circle"
                            width="130"
                            height="130"
                            style="object-fit:cover;"
                        >

                    @else

                        <div
                            class="rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:130px;
                                height:130px;
                                background:#eef3f8;
                            "
                        >
                            <i
                                class="fa-solid fa-user"
                                style="font-size:55px; color:#6c8ba8;"
                            ></i>
                        </div>

                    @endif

                    <button
                        type="button"
                        class="position-absolute d-flex align-items-center justify-content-center rounded-circle border-0"
                        style="
                            width:38px;
                            height:38px;
                            right:0;
                            bottom:0;
                            background:#244D73;
                            color:white;
                            border:3px solid white !important;
                        "
                        data-bs-toggle="modal"
                        data-bs-target="#editProfileModal"
                        title="Edit Profil"
                    >
                        <i class="fa-solid fa-pen" style="font-size:13px;"></i>
                    </button>

                </div>

                <h4 class="fw-bold mb-4" style="color:#244D73;">
                    {{ $user->name }}
                </h4>

            </div>


            <!-- DATA PROFIL -->
            <div class="mx-auto" style="max-width:480px;">

                <div class="d-flex mb-3">

                    <div
                        class="fw-semibold text-muted"
                        style="width:120px;"
                    >
                        Nama
                    </div>

                    <div>
                        {{ $user->name }}
                    </div>

                </div>


                <div class="d-flex mb-3">

                    <div
                        class="fw-semibold text-muted"
                        style="width:120px;"
                    >
                        Username
                    </div>

                    <div>
                        {{ $user->username }}
                    </div>

                </div>


                <div class="d-flex">

                    <div
                        class="fw-semibold text-muted"
                        style="width:120px;"
                    >
                        Role
                    </div>

                    <div>
                        {{ $user->role }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- MODAL EDIT PROFIL -->
<div
    class="modal fade"
    id="editProfileModal"
    tabindex="-1"
    aria-labelledby="editProfileModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">

        <div
            class="modal-content border-0 shadow-lg"
            style="border-radius:18px;"
        >

            <div class="modal-header border-0 px-4 pt-4">

                <div>

                    <h5
                        class="modal-title fw-bold"
                        id="editProfileModalLabel"
                        style="color:#244D73;"
                    >
                        <i class="fa-solid fa-user-pen me-2"></i>
                        Edit Profil
                    </h5>

                    <small class="text-muted">
                        Ubah informasi akun kamu
                    </small>

                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <div class="modal-body px-4 pb-4">

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
                    action="{{ route('admin.user.profile.update') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

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
                            placeholder="Kosongkan jika tidak diganti"
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


                    <div class="d-flex justify-content-end gap-2">

                        <button
                            type="button"
                            class="btn btn-light border"
                            data-bs-dismiss="modal"
                        >
                            Batal
                        </button>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="fa-solid fa-floppy-disk me-1"></i>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection