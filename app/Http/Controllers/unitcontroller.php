<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class unitcontroller extends Controller

{
    public function index()
    {
		$dunit= \App\unit::all();
        return view('unit.index',['dunit' => $dunit]);
    }

    public function create( Request $request )
    {

        $this->validate($request,[
            'code' => 'required',
            'name' => 'required'
   
        ]);

        \App\unit::create($request->all());
        return redirect ('/unit')->with('sukses','Data berhasil diinput');
    }
    public function edit($id)
    {
        $unit= \App\unit::find($id);
        return view('unit/edit',['unit' => $unit]);
    }

    public function update(Request $request,$id)
    {
        $unit = \App\unit::find($id);
        $unit->update($request->all());
        return redirect ('/unit')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $unit = \App\unit::find($id);
        $unit->delete($unit);
        return redirect ('/unit')->with('sukses','Data berhasil dihapus');
    }
}