<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['nama_produk','jenis','brand','type','deskripsi', 'kategoriproduk_id'];

    public function kategoriproduk() 
{ 
    //return $this->belongsTo('App\kategoriproduk','nama_produk');
    return $this->belongsTo('App\kategoriproduk');
}
   public function produkperform()
    {
        return $this->hasMany(produkperform::class);
    }

}