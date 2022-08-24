<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'indonesia_cities';
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class,'province_code','code');
    }
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class,'city_code','code');
    }
    public function kelurahan()
    {
        return $this->hasManyThrough(Kelurahan::class,Kecamatan::class,  'city_code','district_code','code','code');
    }

}
