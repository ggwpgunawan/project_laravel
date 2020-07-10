<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    protected $table = 'layanan';
    protected $fillable = ['kategorilayanan_id','nama_layanan','deskripsi'];

    public function kategorilayanan() 
{ 
    //return $this->belongsTo('App\kategoriproduk','nama_produk');
    return $this->belongsTo('App\kategorilayanan','kategorilayanan_id');
}
}
