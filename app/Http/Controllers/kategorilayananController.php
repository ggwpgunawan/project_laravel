<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategorilayanan;

class kategorilayananController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
        $kategorilayanan = kategorilayanan::all();
        //return $kategoriproduk;
        //dd($kategoriproduk[1]->produk()->toSql());
    	// return data ke view
    	return view('kategorilayanan.index', ['kategorilayanan' => $kategorilayanan]);
    }
    public function store ( Request $request )
    {
        \App\kategorilayanan::create($request->all());
        return redirect ('/kategorilayanan')->with('sukses','Data berhasil diinput');
    }
    public function edit($id)
    {
        $kategorilayanan= \App\kategorilayanan::find($id);
        return view('kategorilayanan/edit',['kategorilayanan' => $kategorilayanan]);
    }

    public function update(Request $request,$id)
    {
        $kategoriproduk = \App\kategoriproduk::find($id);
        $kategoriproduk->update($request->all());
        return redirect ('/kategorilayanan')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $kategoriproduk = \App\kategoriproduk::find($id);
        $kategoriproduk->delete($kategoriproduk);
        return redirect ('/kategorilayanan')->with('sukses','Data berhasil dihapus');
    }
}
