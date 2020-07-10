<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\layanan;
use App\kategorilayanan;

class layananController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
        $layanan = layanan::all();
        //return $produk;

        // mengambil data kategori untuk dropdown
        $kategori = kategorilayanan::pluck('kategori', 'id');

    	// return data ke view
    	return view('layanan.index', [
            'layanan' => $layanan,
            'kategori' => $kategori
        ]);
	}
	public function store( Request $request )
    {
        // sudah masuk sini tinggal disimpan
        // sudah tersimpan ya
        // tinggal menampilkanm kategori di form
        //return request()->all();
        \App\layanan::create($request->all());

        


        return redirect ('/layanan')->with('sukses','Data berhasil diinput');
    }
    public function edit($id)
    {
        $layanan= \App\layanan::find($id);
        $kategori= kategorilayanan::pluck('kategori', 'id');
        return view('layanan/edit',['layanan' => $layanan,'kategori'=> $kategori]);

    }


    public function update(Request $request,$id)
    {
        $layanan = \App\layanan::find($id);
        $layanan->update($request->all());
        return redirect ('/layanan')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $layanan = \App\layanan::find($id);
        $layanan->delete($layanan);
        return redirect ('/layanan')->with('sukses','Data berhasil dihapus');
    }
}
