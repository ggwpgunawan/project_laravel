<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maintenance extends Model
{
    protected $fillable = [
        'kategorilayanan_id', 'layanan_id', 'unit_id', 'vendor_id','tahun_id','semester_id',
        'start_date','end_date','deskripsi','image'
        ,'waktu_pengerjaan','kualitas_pekerjaan','kemudahan_koordinasi','responsive'
        
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
        $rating += $this->waktu_pengerjaan;
        $rating += $this->kualitas_pekerjaan;
        $rating += $this->kemudahan_koordinasi;
        $rating += $this->responsive;
        //semua dijumlah dulu

        $rating = $rating / 4; // terus dibagi 5
        return $rating;
    }    
}
