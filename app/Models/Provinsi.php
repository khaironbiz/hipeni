<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'indonesia_provinces';
    public function kota()
    {
        return $this->hasMany(Kota::class,'province_code','code');
    }
    public function kecamatan()
    {
        return $this->hasManyThrough(Kecamatan::class,Kota::class,  'province_code','city_code','code','code');
    }

}
