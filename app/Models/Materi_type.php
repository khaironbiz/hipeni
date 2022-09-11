<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi_type extends Model
{
    use HasFactory;
    protected $fillable = ['materi_type', 'slug', 'created_by'];
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class);
    }
}
