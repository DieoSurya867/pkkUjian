@extends('layouts.admin')

@section('title')
    Edit Produk - Admin | Sneat - Bootstrap 5 HTML Admin Template - Pro
@endsection

@section('content')
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Barang /</span> Edit Produk</h4>
            <!-- Form controls -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <h5 class="card-header">Form Edit</h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nama Produk</label>
                            <input class="form-control @error('namaProduk') is-invalid
                          @enderror"
                                type="text" id="exampleFormControlReadOnlyInput1" name="namaProduk"
                                value="{{ $barang->namaProduk }}" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Desc Produk</span>
                            <textarea class="form-control" aria-label="With textarea" name="descProduk">{{ $barang->descProduk }}
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Harga</label>
                            <input class="form-control @error('harga') is-invalid
                          @enderror"
                                type="number" id="exampleFormControlReadOnlyInput1" name="harga"
                                value="{{ $barang->harga }}" />
                        </div>
                        <div class="mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <img class="img-fluid d-flex mx-auto my-4" src="{{ asset('storage/' . $barang->foto) }}"
                                        alt="Card image cap" />
                                </div>
                            </div>
                            {{-- <img src="{{ asset('storage/' . $galeri->photos) }}" alt=""> --}}
                            <label for="formFile" class="form-label">Ganti Foto Produk</label>
                            <input class="form-control" type="file" id="formFile" name="foto" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Pilih Kategori Barang</label>
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
