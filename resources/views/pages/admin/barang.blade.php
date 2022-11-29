@extends('layouts.admin')


@section('title')
    Dashboard - Barang | Sneat - Bootstrap 5 HTML Admin Template - Pro
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Barang</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Table Produk</h5>
                <div class="table-responsive text-nowrap">
                    <a href="{{ route('barang.create') }}" class="ms-4 mb-4 btn btn-sm  btn-outline-primary">Tambah
                        Barang</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th>DescProduk</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($barang as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>{{ $item['namaProduk'] }}</td>
                                    <td><img src="{{ asset('storage/' . $item->foto) }}" alt="" width="100px"
                                            height="100px">
                                    </td>
                                    <td>{{ $item['harga'] }}
                                    </td>
                                    <td>{{ $item['descProduk'] }}</td>
                                    <td>{{ $item->kategori->namaKategori }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('barang.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                {{-- <a class="dropdown-item" href="{{ url('deleteproduk/' . $item->id) }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a> --}}
                                                <a class="dropdown-item" href="{{ route('deletebarang', $item->id) }}"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="my-5" />
            <!--/ Responsive Table -->
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
