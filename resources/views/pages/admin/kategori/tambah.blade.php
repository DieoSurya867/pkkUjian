@extends('layouts.admin')

@section('title')
    Tambah Data - Kategori | Sneat - Bootstrap 5 HTML Admin Template - Pro
@endsection

@section('content')
    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Kategori / </span> Tambah Data</h4>
            <!-- Form controls -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <h5 class="card-header">Form Controls</h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                            <input type="text"
                                class="form-control @error('namaKategori') is-invalid
                          @enderror"
                                id="exampleFormControlInput1" placeholder="Name Kategori" name="namaKategori"
                                value="{{ old('namaKategori') }}" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Deskripsi</span>
                            <textarea class="form-control @error('descKategori') is-invalid @enderror" aria-label="With textarea"
                                name="descKategori" value="{{ old('descKategori') }}">
                            </textarea>
                        </div>

                        <div>
                            <button type="submit" class="ms-1 btn btn-sm  btn-outline-primary">Tambah Data</button>
                        </div>
                    </div>
                </div>
    </form>
    </div>
    </div>
@endsection
