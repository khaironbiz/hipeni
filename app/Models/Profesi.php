<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_profesi',
        'slug',
        'created_by',

    ];
    public function organisasi_profesi(){
        return $this->hasMany(Organisasi_profesi::class, 'id_profesi', 'id');
    }
}
