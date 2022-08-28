<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mulai', 'selesai', 'sebagai', 'nama_organisasi',
        'slug', 'active', 'keterangan', ];

}
