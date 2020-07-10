<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\kategoriproduk;

class produkController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
        $produk = produk::all();
        //return $produk;
        
        // mengambil data kategori untuk dropdown
        $kategori = kategoriproduk::pluck('kategori', 'id');

    	// return data ke view
    	return view('produk.index', [
            'produk' => $produk,
            'kategori' => $kategori
        ]);
	}
	public function store( Request $request )
    {
        // sudah masuk sini tinggal disimpan
        // sudah tersimpan ya
        // tinggal menampilkanm kategori di form
        //return request()->all();
        \App\produk::create($request->all());

        


        return redirect ('/produk')->with('sukses','Data berhasil diinput');
    }
    public function edit($id)
    {
        $produk= \App\produk::find($id);
        $kategori = kategoriproduk::pluck('kategori', 'id');
        return view('produk/edit',['produk' => $produk,'kategori'=> $kategori]);

    }


    public function update(Request $request,$id)
    {
        $produk = \App\produk::find($id);
        $produk->update($request->all());
        return redirect ('/produk')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $produk = \App\produk::find($id);
        $produk->delete($produk);
        return redirect ('/produk')->with('sukses','Data berhasil dihapus');
    }
}
