<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// memanggil model kategoriproduk

use App\kategoriproduk;

class kategoriprodukController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
        $kategoriproduk = kategoriproduk::all();
        //return $kategoriproduk;
        //dd($kategoriproduk[1]->produk()->toSql());
    	// return data ke view
    	return view('kategoriproduk.index', ['kategoriproduk' => $kategoriproduk]);
    }
    public function store ( Request $request )
    {
        \App\kategoriproduk::create($request->all());
        return redirect ('/kategoriproduk')->with('sukses','Data berhasil diinput');
    }
    public function edit($id)
    {
        $kategoriproduk= \App\kategoriproduk::find($id);
        return view('kategoriproduk/edit',['kategoriproduk' => $kategoriproduk]);
    }

    public function update(Request $request,$id)
    {
        $kategoriproduk = \App\kategoriproduk::find($id);
        $kategoriproduk->update($request->all());
        return redirect ('/kategoriproduk')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $kategoriproduk = \App\kategoriproduk::find($id);
        $kategoriproduk->delete($kategoriproduk);
        return redirect ('/kategoriproduk')->with('sukses','Data berhasil dihapus');
    }
}
