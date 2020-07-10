<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tahun extends Model
{

    protected $table = 'tahun';
    protected $fillable = ['tahun'];
    
    public function produkperform()
    {
       
        return $this->hasMany(produkperform::class);
    }

}
