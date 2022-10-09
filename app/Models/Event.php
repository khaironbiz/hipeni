<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_penyelenggara',
        'training_id',
        'education_level',
        'judul',
        'isi',
        'date_publish',
        'harga',
        'kuota',
        'banner',
        'date_mulai',
        'date_selesai',
        'tempat',
        'ringkasan',
        'banner',
        'slug',
        'status',
        'created_by',
        'created_at',
    ];
    public function partner()
    {
        return $this->belongsTo(Partner::class,'id_penyelenggara','id');
    }
}
