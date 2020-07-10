<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vendor;
use App\unit;
use App\tahun;
use App\semester;
use App\kategorilayanan;
use App\layanan;
use App\vendorproject;

class vendorprojectcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kategori = kategorilayanan::all();

      // untuk menampilkan semua data
      $vendorproject = vendorproject::with(
        'kategorilayanan', 'layanan', 'unit', 'vendor', 'tahun', 'semester'
    )->latest()->paginate(10); // pakai latest supaya data terbaru ada di hal pertama
    // return $produkperform;

    return view('vendorproject.index', [
        'vendorproject' => $vendorproject,
        'kategori' => $kategori,
        compact('index')
       
    ]);
    }

    public function layanan(){
        $kategorilayanan_id = Input::get('kategorilayanan_id');
        $layanan = layanan::where('kategorilayanan_id', '=', $kategorilayanan_id)->get();
        return response()->json($layanan);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategorilayanan::pluck('kategori', 'id');
        // ambil data produk
        $layanan = layanan::pluck('nama_layanan', 'id');
        // ambil data vendor
        $vendor = vendor::pluck('nama_vendor', 'id');
        // ambil data unit
        $unit = unit::pluck('name', 'id');
        // ambil data tahun
        $tahun = tahun::pluck('tahun', 'id');
        // ambil data semester
        $semester = semester::pluck('semester', 'id');
        


        return view('vendorproject.create', [
            'kategori' => $kategori,
            'layanan' => $layanan,
            'vendor' => $vendor,
            'unit' => $unit,
            'tahun' => $tahun,
            'semester' => $semester,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
         
        //$this->validate($request, [
		//	'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		//	'keterangan' => 'required',
        //]);
        
        $layanan = layanan::where('kategorilayanan_id', $request->get('id'))
            ->pluck('nama_layanan', 'id');
            return response()->json($layanan);
        

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'bangke';
		$file->move($tujuan_upload,$nama_file);
        
        //return request()->all(); 
		\App\vendorproject::create([
            'kategorilayanan_id' => $request->kategorilayanan_id,
            'layanan_id' => $request->layanan_id,
            'unit_id' => $request->unit_id,
            'vendor_id' => $request->vendor_id,
            'tahun_id' => $request->tahun_id,
            'semester_id' => $request->semester_id,
            'tgl_bast' => $request->tgl_bast,
            'deskripsi' => $request->deskripsi,
            'pengiriman_material' => $request->pengiriman_material,
            'waktu_pengerjaan' => $request->waktu_pengerjaan,
            'kualitas_pengerjaan' => $request->kualitas_pengerjaan,
            'kemudahan_koordinasi' => $request->kemudahan_koordinasi,
            'responsive' => $request->responsive,
            'image' => $nama_file
		]);
        
        // untuk mengambil data dari form create
        // lalu menyimpan di db

        // nah disini dd() dipakai untuk ngecek input dari form
        //return request()->all(); 
        //return request()->all(); 
        //$data = request()->all();
        //\App\vendorproject::create($request->all());
       
       // $produkperform = produkperform::create($data);
      
       

        // redirect with msg
        return redirect ('/vendorproject')->with('sukses','Data berhasil diinput');

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
       // untuk menampilkan data yg akan diedit
       $vendorproject = vendorproject::findOrFail($id);
       // dan menampilkan form edit

       // ambil data kategori
       $kategori = kategorilayanan::pluck('kategori', 'id');
       // ambil data produk
       $layanan = layanan::pluck('nama_layanan', 'id');
       // ambil data vendor
       $vendor = vendor::pluck('nama_vendor', 'id');
       // ambil data unit
       $unit = unit::pluck('name', 'id');
       // ambil data tahun
       $tahun = tahun::pluck('tahun', 'id');
       // ambil data semester
       $semester = semester::pluck('semester', 'id');

       // nama biew sesuaikan dgn function
       return view('vendorproject.edit', [
           'kategori' => $kategori,
           'layanan' => $layanan,
           'vendor' => $vendor,
           'unit' => $unit,
           'tahun' => $tahun,
           'semester' => $semester,
           'vendorproject' => $vendorproject,
       ]); 
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
         // untuk mengambil data dari form edit
        // lalu mengupdate di db
        $data = request()->all();
        // return $data;

        // update data
        $vendorproject = vendorproject::findOrFail($id);
        $vendorproject->update($data);

        // redirect with msg
        return redirect ('/vendorproject')->with('sukses','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // untuk menghapus data
        
        // hapus data
        $vendorproject = vendorproject::findOrFail($id);
        $vendorproject->delete();

        // redirect with msg
        return redirect ('/vendorproject')->with('sukses','Data berhasil dihapus');
    }
}
