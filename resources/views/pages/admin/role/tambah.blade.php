@extends('layouts.admin')

@section('title')
    Tambah Data - User | Sneat - Bootstrap 5 HTML Admin Template - Pro
@endsection

@section('content')
    <form action="{{ url('admin/user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / User /</span> Tambah Akun</h4>
            <!-- Form controls -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <h5 class="card-header">Form Controls</h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Pengguna</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid
                          @enderror"
                                id="exampleFormControlInput1" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email Pengguna</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid
                          @enderror"
                                id="exampleFormControlInput1" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" name="password" type="password" value=""
                                    id="html5-password-input" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Pilih Role User</label>
                            <select class="form-select @error('role') is-invalid
                          @enderror"
                                id="exampleFormControlSelect1" aria-label="Default select example" name="role">
                                <option selected>Pilih Nama Role</option>

                                <option value="admin">
                                    admin</option>
                                <option value="editor">
                                    editor</option>
                                <option value="user">
                                    user</option>

                            </select>
                        </div>
                        <div>
                            <button type="submit" class="mt-3 ms-1 btn btn-sm  btn-outline-primary">Buat Akun</button>

                        </div>
                    </div>
                </div>
    </form>
    </div>
    </div>
@endsection
