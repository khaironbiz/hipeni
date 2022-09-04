<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_method extends Model
{
    use HasFactory;
    protected $fillable = ['study_method', 'slug', 'created_by'];
}
