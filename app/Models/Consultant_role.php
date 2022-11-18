<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Consultant_role extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded = [];

    public function consultant()
    {
        return $this->hasMany(Consultant::class,'role','id');
    }
}
