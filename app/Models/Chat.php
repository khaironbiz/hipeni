<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Chat extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded=[];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class,'consultation_id','id');
    }
    public function user_sender()
    {
        return $this->belongsTo(User::class,'id_sender','id');
    }
    public function user_receiver()
    {
        return $this->belongsTo(User::class,'id_receiver','id');
    }
}
