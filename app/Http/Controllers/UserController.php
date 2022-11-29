<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampil()
    {
        // untuk tampilan User Home
        $artikel = Artikel::all();
        // $data = produk::all()->sortByDesc('jumlahTerjual')->skip(0)->take(8);
        return view('pages.user.home', compact('artikel'));
    }

    public function index()
    {

        return view('pages.user.rekomendasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saranJamu = new saranJamu($request->keluhan, $request->lahir,);
        $data = [
            'keluhan' => $request->keluhan,
            'namaJamu' => $saranJamu->namaJamu(),
            'lahir' => $saranJamu->umur(),
            'saran' => $saranJamu->saranJamu1(),
        ];
        return view('pages.user.rekomendasi', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class parentJamu
{
    public function __construct($keluhan, $lahir)
    {
        $this->keluhan = $keluhan;
        $this->lahir = $lahir;
    }
    public function umur()
    {
        return 2022 - $this->lahir;
    }
}

class saranJamu extends parentJamu
{
    public function namaJamu()
    {

        $namaJamu = $this->keluhan;
        if ($namaJamu == 'Keseleo') {
            return 'Beras Kencur';
        } elseif ($namaJamu == 'Pegal-Pegal') {
            return 'Kunyit Asam';
        } elseif ($namaJamu == 'Darah-Tinggi') {
            return 'BrotoWali';
        } elseif ($namaJamu == 'Masuk-Angin') {
            return 'Temulawak';
        }
    }
    public function saranJamu1()
    {
        $umur = $this->umur();
        $jamu = $this->namaJamu();

        if ($umur > 10 && $jamu = 'Beras Kencur') {
            return "Dioleskan 2x";
        } elseif ($umur < 10 && $jamu = 'Beras Kencur') {
            return "Dioleskan 1x";
        } elseif ($umur < 10) {
            return "Dikonsumsi 1x";
        } else {
            return "Dikonsumsi 2x";
        }
    }
}
