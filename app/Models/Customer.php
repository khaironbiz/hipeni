<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'nama_depan', 'nama_belakang', 'nik','jk','tl','status','username','email', 'hp','alamat', 'password', 'foto',
    ];
}
