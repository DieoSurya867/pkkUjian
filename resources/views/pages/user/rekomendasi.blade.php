@extends('layouts.perpus')

@section('content')
    <!-- Form controls -->
    <div class="card mb-4">
        <h5 class="card-header">Isi Keluhan Anda</h5>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('rekomendasi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Pilih Kategori Keluhan</label>
                        <select class="form-select @error('keluhan') is-invalid
                          @enderror"
                            id="exampleFormControlSelect1" aria-label="Default select example" name="keluhan">
                            <option selected>Pilih Nama Keluhan</option>
                            <option value="Keseleo">
                                Keseleo</option>
                            <option value="Pegal-Pegal">
                                Pegal-Pegal</option>
                            <option value="Darah-Tinggi">
                                Darah Tinggi Dan Gula Darah</option>
                            <option value="Masuk-Angin">
                                Kram Perut Dan Masuk Angin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="number" class="form-control" name="lahir">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <h3>Rekomendasi Jamu</h3>
                            <th scope="col">Nama Jamu</th>
                            {{-- <th scope="col">Khasiat</th> --}}
                            <th scope="col">Keluhan</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Saran Penggunaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @isset($data)
                                <td>{{ $data['namaJamu'] }}</td>
                                {{-- <td>{{ $data['khasiat'] }}</td> --}}
                                <td>{{ $data['keluhan'] }}</td>
                                <td>{{ $data['lahir'] }} Tahun</td>
                                <td>{{ $data['saran'] }}</td>
                            @endisset
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
