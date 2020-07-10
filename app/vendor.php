<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $table = 'vendor';
    protected $fillable = ['nama_vendor','alamat_vendor','no_telp','email','deskripsi'];
}
