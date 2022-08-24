<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'indonesia_districts';
    public function kota()
    {
        return $this->belongsTo(Kota::class,'city_code','code');
    }
    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class,'district_code','code');
    }
}
