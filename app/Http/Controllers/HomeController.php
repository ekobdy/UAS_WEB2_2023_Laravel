<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();

        return view('kategori/index', ['kategori' => $kategori]);
    }

    public function tambah()
    {
        return view('kategori.form');
    }

    public function simpan(Request $request)
    {
        Kategori::create(['nama' => $request->nama]);

        return redirect()->route('kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);

        return view('kategori.form', ['kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        Kategori::find($id)->update(['nama' => $request->nama]);

        return redirect()->route('kategori');
    }

    public function hapus($id)
    {
        Kategori::find($id)->delete();

        return redirect()->route('kategori');
    }
}
