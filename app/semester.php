<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    protected $table = 'semester';
    protected $fillable = ['semester'];

    public function produkperform()
    {
        return $this->hasMany(produkperform::class);
    }

}
