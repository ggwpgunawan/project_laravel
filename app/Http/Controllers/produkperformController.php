<?php

namespace App\Http\Controllers;

use App\produkperform;
use App\kategoriproduk;
use App\produk;
use App\vendor;
use App\unit;
use App\tahun;
use App\semester;
use Illuminate\Http\Request;

class produkperformController extends Controller
{
    // public function index()
    // {
    // 	// mengambil semua data pengguna
    //     $produkperform = produkperform::with('kategoriproduk', 'produk', 'unit', 'vendor')->get();
        
    //     // echo "contoh DD";
    //     dd($produkperform); // contoh 1 dulu ya

    //     // contoh return
    //    // return $produkperform;

    //     $produkperform = produkperform::paginate(5);
    //     //dd($produkperform[1]->produkperform()->toSql());
    //     //return $produk;
    //     // mengambil data kategori untuk dropdown
        
        
    //     $kategori = kategoriproduk::pluck('kategori', 'id');
    //     $produk = produk::pluck('nama_produk', 'id');
    //    // return data ke view
    // 	return view('produkperform.index', [
    //         'produkperform' => $produkperform,
    //         'kategori' => $kategori

            
    //     ]);
    // }

    public function index()
    {
        // untuk menampilkan semua data
        $produkperform = produkperform::with(
            'kategoriproduk', 'produk', 'unit', 'vendor', 'tahun', 'semester'
        )->latest()->paginate(10); // pakai latest supaya data terbaru ada di hal pertama
        // return $produkperform;

        return view('produkperform.index', [
            'produkperform' => $produkperform,
        ]);
    }

    public function create()
    {
        // mulai dari create dulu, jadi nanti supaya menampilkan index ada datanya

        // untuk membuat data baru dan menampilkan form create

        // ambil data kategori
        $kategori = kategoriproduk::pluck('kategori', 'id');
        // ambil data produk
        $produk = produk::pluck('nama_produk', 'id');
        // ambil data vendor
        $vendor = vendor::pluck('nama_vendor', 'id');
        // ambil data unit
        $unit = unit::pluck('name', 'id');
        // ambil data tahun
        $tahun = tahun::pluck('tahun', 'id');
        // ambil data semester
        $semester = semester::pluck('semester', 'id');

        return view('produkperform.create', [
            'kategori' => $kategori,
            'produk' => $produk,
            'vendor' => $vendor,
            'unit' => $unit,
            'tahun' => $tahun,
            'semester' => $semester,
        ]);
    }

    public function store(Request $request)
    {
        // untuk mengambil data dari form create
        // lalu menyimpan di db

        // nah disini dd() dipakai untuk ngecek input dari form
        // return request()->all(); 

        //$data = request()->all();
        //\App\produkperform::create($request->all());
        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'bangke';
		$file->move($tujuan_upload,$nama_file);
        
        //return request()->all(); 
		\App\produkperform::create([
            'kategoriproduk_id' => $request->kategoriproduk_id,
            'produk_id' => $request->produk_id,
            'unit_id' => $request->unit_id,
            'vendor_id' => $request->vendor_id,
            'tahun_id' => $request->tahun_id,
            'semester_id' => $request->semester_id,
            'pembelian' => $request->pembelian,
            'deskripsi' => $request->deskripsi,
            'kualitas' => $request->kualitas,
            'support' => $request->support,
            'pengadaan' => $request->pengadaan,
            'sukucadang' => $request->sukucadang,
            'performance' => $request->performance,
            'fitur' => $request->fitur,
            'penggunaan' => $request->penggunaan,
            'garansi' => $request->garansi,
            'image' => $nama_file
		]);
       
       // $produkperform = produkperform::create($data);

        // redirect with msg
        return redirect ('/produkperform')->with('sukses','Data berhasil diinput');

    }

    public function show($id)
    {
        // untuk menampilkan detail
    }

    public function edit($id)
    {
        // untuk menampilkan data yg akan diedit
        $produkperform = produkperform::findOrFail($id);
        // dan menampilkan form edit

        // ambil data kategori
        $kategori = kategoriproduk::pluck('kategori', 'id');
        // ambil data produk
        $produk = produk::pluck('nama_produk', 'id');
        // ambil data vendor
        $vendor = vendor::pluck('nama_vendor', 'id');
        // ambil data unit
        $unit = unit::pluck('name', 'id');
        // ambil data tahun
        $tahun = tahun::pluck('tahun', 'id');
        // ambil data semester
        $semester = semester::pluck('semester', 'id');

        // nama biew sesuaikan dgn function
        return view('produkperform.edit', [
            'kategori' => $kategori,
            'produk' => $produk,
            'vendor' => $vendor,
            'unit' => $unit,
            'tahun' => $tahun,
            'semester' => $semester,
            'produkperform' => $produkperform,
        ]);
    }

    public function update(Request $request, $id)
    {
        // untuk mengambil data dari form edit
        // lalu mengupdate di db
        $data = request()->all();
        // return $data;

        // update data
        $produkperform = produkperform::findOrFail($id);
        $produkperform->update($data);

        // redirect with msg
        return redirect ('/produkperform')->with('sukses','Data berhasil diupdate');
        
    }

    public function destroy($id)
    {
        // untuk menghapus data
        
        // hapus data
        $produkperform = produkperform::findOrFail($id);
        $produkperform->delete();

        // redirect with msg
        return redirect ('/produkperform')->with('sukses','Data berhasil dihapus');
    }
    

}

