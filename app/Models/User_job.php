<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_job extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'mulai', 'selesai', 'posisi', 'perusahaan', 'slug', 'active', 'file'];
}
