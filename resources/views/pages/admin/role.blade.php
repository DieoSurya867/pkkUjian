@extends('layouts.admin')


@section('title')
    Dashboard - User | Sneat - Bootstrap 5 HTML Admin Template - Pro
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> User</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Table User</h5>
                <div class="table-responsive text-nowrap">
                    <a href="{{ route('user.create') }}" class="ms-4 mb-4 btn btn-sm  btn-outline-primary">Buat Akun User</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($user as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['role'] }}
                                    </td>
                                    {{-- <td>{{ $item->client }}</td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('user.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                {{-- <a class="dropdown-item" href="{{ url('deleteproduk/' . $item->id) }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a> --}}
                                                <a class="dropdown-item" href="{{ route('deleteuser', $item->id) }}"><i
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
