<?php

namespace App\Http\Controllers;

use App\maintenance;
use Illuminate\Http\Request;
use App\vendor;
use App\unit;
use App\tahun;
use App\semester;
use App\kategorilayanan;
use App\layanan;


class maintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // untuk menampilkan semua data
      $maintenance = maintenance::with(
        'kategorilayanan', 'layanan', 'unit', 'vendor', 'tahun', 'semester'
    )->latest()->paginate(10); // pakai latest supaya data terbaru ada di hal pertama
    // return $produkperform;

    return view('maintenance.index', [
        'maintenance' => $maintenance,
    ]);
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
        


        return view('maintenance.create', [
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
        $file = $request->file('image');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'bangke';
		$file->move($tujuan_upload,$nama_file);
        
        //return request()->all(); 
		\App\maintenance::create([
            'kategorilayanan_id' => $request->kategorilayanan_id,
            'layanan_id' => $request->layanan_id,
            'unit_id' => $request->unit_id,
            'vendor_id' => $request->vendor_id,
            'tahun_id' => $request->tahun_id,
            'semester_id' => $request->semester_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'deskripsi' => $request->deskripsi,
            'waktu_pengerjaan' => $request->waktu_pengerjaan,
            'kualitas_pekerjaan' => $request->kualitas_pekerjaan,
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
        return redirect ('/maintenance')->with('sukses','Data berhasil diinput');
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
       $maintenance = maintenance::findOrFail($id);
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
       return view('maintenance.edit', [
           'kategori' => $kategori,
           'layanan' => $layanan,
           'vendor' => $vendor,
           'unit' => $unit,
           'tahun' => $tahun,
           'semester' => $semester,
           'maintenance' => $maintenance,
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
        $maintenance = maintenance::findOrFail($id);
        $maintenance->update($data);

        // redirect with msg
        return redirect ('/maintenance')->with('sukses','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // hapus data
         $maintenance = maintenance::findOrFail($id);
         $maintenance->delete();
 
         // redirect with msg
         return redirect ('/maintenance')->with('sukses','Data berhasil dihapus');
    }
}
