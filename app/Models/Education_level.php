<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_level extends Model
{
    use HasFactory;
    public function education_type()
    {
        return $this->belongsTo(Education_type::class,'education_type_id','id');
    }
    public function education_user()
    {
        return $this->hasMany(Education_user::class, 'education_level_id', 'id');
    }
    public function pendidikan_formal()
    {
        $users = DB::table('education_level')
            ->whereNotIn('sifat', [2, 0])
            ->join('education_type', 'education_type.id', '=', 'education_level.education_type_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('education_level.*', 'education_type.sifat');
        return $users;
    }
}
