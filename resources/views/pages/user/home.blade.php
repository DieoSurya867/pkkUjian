@extends('layouts.perpus')

@section('content')
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>Rekomendasi Jamu</h3>
                <p>
                    Bingung Dengan Pilihan Jamu Yang Cocok Dengan Permasalahan Anda ? Isi Form Berikut Ini
                    Biar Kamu Tau Jamu Mana Yang Cocok Dengan Kamu
                </p>
                <a href="{{ url('/rekomendasi') }}" class="btn">Halaman Rekomendasi Jamu</a>
            </div>
        </div>
    </section>

    <section class="blogs" id="blogs">
        <h1 class="heading"><span>our blogs</span></h1>

        <div class="swiper blogs-slider">
            <div class="swiper-wrapper">

                @forelse($artikel as $item)
                    <div class="swiper-slide box">

                        <div class="content">
                            <center>
                                <h3 class="text-center">{{ $item->judul }}</h3>

                                <h4>{{ $item->created_at }}</h4>
                            </center>
                            <p>
                                {{ $item->isi }}
                            </p>
                            <a href="#" class="btn">read more</a>
                        </div>
                    </div>
                @empty
                    <div class="col-3 mb-5">
                        <h5>Artikel Sedang Kosong</h5>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection
