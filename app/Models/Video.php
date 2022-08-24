<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', 'channel', 'judul', 'id_video', 'slug', 'publish', 'created_by',
    ];
}
