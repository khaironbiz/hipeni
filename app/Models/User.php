<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gelar_depan',
        'gelar_belakang',
        'nama_depan',
        'nama_belakang',
        'nama_lengkap',
        'tgl_lahir',
        'jenis_kelamin',
        'nik', 'nira',
        'username',
        'password',
        'email',
        'foto',
        'phone_cell',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function education_user()
    {
        return $this->hasMany(Education_user::class,'user_id','id');
    }
    public function materi_type()
    {
        return $this->hasMany(Materi_type::class,'created_at','id');
    }

}
