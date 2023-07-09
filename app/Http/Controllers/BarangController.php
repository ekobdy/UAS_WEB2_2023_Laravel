<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::get();

        return view('barang.index', ['data' => $barang]);
    }

    public function tambah()
    {
        $kategori = Kategori::get();

        return view('barang.form', ['kategori' => $kategori]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ];

        Barang::create($data);

        return redirect()->route('barang');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        $kategori = Kategori::get();

        return view('barang.form', ['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ];

        Barang::find($id)->update($data);

        return redirect()->route('barang');
    }

    public function hapus($id)
    {
        Barang::find($id)->delete();

        return redirect()->route('barang');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Validasi jika kata kunci pencarian kosong
        if (empty($keyword)) {
        return redirect()->back()->withInput()->withErrors('Kata kunci pencarian harus diisi.');
    }

        $results = Barang::where('nama_barang', 'like', '%' . $keyword . '%')->get();


    return view('barang.search', ['results' => $results]);
    }

}
