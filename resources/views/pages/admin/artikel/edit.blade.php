@extends('layouts.admin')

@section('title')
    Edit Artikel - Admin | Sneat - Bootstrap 5 HTML Admin Template - Pro
@endsection

@section('content')
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Artikel /</span> Edit Artikel</h4>
            <!-- Form controls -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <h5 class="card-header">Form Edit</h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nama Judul Artikel</label>
                            <input class="form-control @error('judul') is-invalid
                          @enderror"
                                type="text" id="exampleFormControlReadOnlyInput1" name="judul"
                                value="{{ $artikel->judul }}" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Isi Artikel</span>
                            <textarea class="form-control" aria-label="With textarea" name="isi">{{ $artikel->isi }}
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Pilih Kategori Artikel</label>
                            <select class="form-select @error('kategori_id') is-invalid
                          @enderror"
                                id="exampleFormControlSelect1" aria-label="Default select example" name="kategori_id">
                                <option selected>Pilih Nama Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $artikel->kategori_id ? 'selected' : '' }}>{{ $item->namaKategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <a href="/admin/produk" class="mt-1 btn btn-danger">Batal</a>
                            <button type="submit" class="mt-1 ms-1 btn btn-sm  btn-outline-primary">Edit produk</button>

                        </div>
                    </div>
                </div>
    </form>
    </div>
    </div>
@endsection
