<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendorproject extends Model
{
    protected $fillable = [
        'kategorilayanan_id', 'layanan_id', 'unit_id', 'vendor_id','tahun_id','semester_id',
        'tgl_bast','deskripsi','image'
        ,'pengiriman_material','waktu_pengerjaan','kualitas_pengerjaan','kemudahan_koordinasi','responsive'
        
    ];
    
    public function kategorilayanan()
    {
        return $this->belongsTo(kategorilayanan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(layanan::class);
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
        $rating += $this->pengiriman_material;
        $rating += $this->waktu_pengerjaan;
        $rating += $this->kualitas_pengerjaan;
        $rating += $this->kemudahan_koordinasi;
        $rating += $this->responsive;
        //semua dijumlah dulu

        $rating = $rating / 5; // terus dibagi 5
        return $rating;
    }    
}
