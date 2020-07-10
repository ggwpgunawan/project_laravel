<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategoriproduk extends Model
{
    protected $table = 'kategoriproduk';
    protected $fillable = ['kategori','deskripsi'];
 
    public function produk()
    {
        //return $this->hasmanyy('App\produk','kategoriproduk_id');
        return $this->hasMany('App\produk');
    }
    
}
