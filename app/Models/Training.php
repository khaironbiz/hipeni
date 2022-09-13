<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['education_level','nama_training', 'slug', 'icon', 'created_by'];
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class,'training_id','id');
    }
    public function kurikulum_detail()
    {
        return $this->hasManyThrough(Kurikulum_detail::class,Kurikulum::class);
    }
}
