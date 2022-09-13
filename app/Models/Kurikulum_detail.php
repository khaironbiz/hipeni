<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum_detail extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'kurikulum_id', 'study_method_id', 'jpl', 'slug', 'created_by'];
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }
    public function study_method()
    {
        return $this->belongsTo(Study_method::class);
    }

}
