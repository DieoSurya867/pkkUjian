<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('pages.admin.barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.admin.barang.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'namaProduk' => 'required|string',
            'foto' => 'required|image|max:10000|mimes:png,jpg,svg',
            'harga' => 'required|integer',
            'descProduk' => 'required|string',
            'kategori_id' => 'required',
        ]);
        $file = $request->file('foto')->store('barang');
        $validator['foto'] = $file;
        Artikel::create($validator);
        return redirect('admin/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('pages.admin.barang.edit', [
            'barang' => $barang,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $barang = Barang::findOrFail($id);
        $validator = $request->validate([
            'namaProduk' => 'required|string',
            'harga' => 'required|integer',
            'descProduk' => 'required|string',
            'kategori_id' => 'required',
        ]);
        $barang->update($validator);
        $dataLama = Barang::where('id', $id)->first();

        if ($request->file('foto')) {
            $foto1 = public_path('storage/' . $dataLama->foto);
            if (File::exists($foto1)) {
                File::delete($foto1);
            }
            $file = $request->file('foto')->store('barang');
            $barang->update([
                'foto' => $file,
            ]);
            return redirect('admin/barang');
        }
        return redirect('admin/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataLama = Barang::where('id', $id)->first();
        $foto1 = public_path('storage/' . $dataLama->foto);
        if (File::exists($foto1)) {
            File::delete($foto1);
        }
        Barang::where('id', $id)->delete();
        return redirect('admin/barang');
    }
}
