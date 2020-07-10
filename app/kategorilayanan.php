<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategorilayanan extends Model
{
    protected $table = 'kategorilayanan';
    //protected $fillable = ['kategori','deskripsi'];
 
    public function layanan()
    {
        //return $this->hasmanyy('App\produk','kategoriproduk_id');
        return $this->hasMany('App\layanan','kategorilayanan_id');
    }
}
