<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_user extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function education_level()
    {
        return $this->belongsTo(Education_level::class,'education_level_id','id');
    }
}
