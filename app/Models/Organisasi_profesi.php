<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi_profesi extends Model
{
    use HasFactory;
    public function profesi(){
        return $this->belongsTo(Profesi::class, 'id_profesi', 'id');
    }
}
