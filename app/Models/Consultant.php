<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Consultant extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded=[];

    public function consultation()
    {
        return $this->hasMany(Consultation::class,'consultant_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function consultant_role()
    {
        return $this->belongsTo(Consultant_role::class,'role','id');
    }
}
