<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vendorcontroller extends Controller

{
    public function index()
    {
		$vendor1= \App\vendor::all();
        return view('vendor.index',['vendor1' => $vendor1]);
    }

    public function create( Request $request )
    {

        $this->validate($request,[
            'nama_vendor' => 'required',
            'alamat_vendor' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'deskripsi' => 'required'
   
        ]);
        \App\vendor::create($request->all());
        return redirect ('/vendor')->with('sukses','Data berhasil diinput');
    }
    public function edit($id)
    {
        $this->authorize('edit data'); // ditambahkan baris ini lalu save
        $vendor= \App\vendor::find($id);
        return view('vendor/edit',['vendor' => $vendor]);
    }

    public function update(Request $request,$id)
    {

        

        $vendor = \App\vendor::find($id);
        $vendor->update($request->all());
        return redirect ('/vendor')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $vendor = \App\vendor::find($id);
        $vendor->delete($vendor);
        return redirect ('/vendor')->with('sukses','Data berhasil dihapus');
    }
}