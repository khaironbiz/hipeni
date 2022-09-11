<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function training()
    {
        return $this->belongsTo(Training::class,'training_id','id');
    }
    public function materi_type()
    {
        return $this->belongsTo(Materi_type::class);
    }
}
