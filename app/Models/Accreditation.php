<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function op(){
        return $this->belongsTo(Organisasi_profesi::class, 'organisasi_profesi_id', 'id');
    }
}
