<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_method extends Model
{
    use HasFactory;
    protected $fillable = ['study_method','durasi', 'slug', 'created_by'];
    public function kurikulum_detail()
    {
        return $this->hasMany(Kurikulum_detail::class);
    }
}
