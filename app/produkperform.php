<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produkperform extends Model
{

    // semua kolom di table masukan kesini
    // tadi eror karena ada kolom yg tidak dimasukan
    protected $fillable = [
        'kategoriproduk_id', 'produk_id', 'vendor_id', 'unit_id',
        'pembelian', 'deskripsi',
        'tahun_id', 'semester_id',
        'kualitas', 'support', 'pengadaan', 'sukucadang', 'performance', 'fitur', 'penggunaan', 'garansi',
        'image'
    ];
    
    public function kategoriproduk()
    {
        return $this->belongsTo(kategoriproduk::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }

    public function unit()
    {
        return $this->belongsTo(unit::class);
    }

    public function vendor()
    {
        return $this->belongsTo(vendor::class);
    }

    public function tahun()
    {
        return $this->belongsTo(tahun::class);
    }

    public function semester()
    {
        return $this->belongsTo(semester::class);
    }

    public function getTotalRatingAttribute()
    {
        // ini untuk total rating
        $rating = 0;
        $rating += $this->kualitas;
        $rating += $this->support;
        $rating += $this->pengadaan;
        $rating += $this->sukucadang;
        $rating += $this->performance;
        $rating += $this->fitur;
        $rating += $this->penggunaan;
        $rating += $this->garansi;
        //semua dijumlah dulu

        $rating = $rating / 8; // terus dibagi 8
        return $rating;
    }
}
