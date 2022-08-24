<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_type extends Model
{
    use HasFactory;
    public function education_level()
    {
        return $this->hasMany(Education_level::class,'education_type_id','id');
    }

}
