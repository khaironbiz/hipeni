<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Consultation extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function consultant()
    {
        return $this->belongsTo(Consultant::class,'consultant_id','id');
    }
//    public function user_consultant()
//    {
//        return $this->belongsTo(User::class,'consultant_id','id');
//    }
    public function chat()
    {
        return $this->hasMany(Chat::class,'consultation_id','id');
    }
}
