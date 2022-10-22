<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_username($user_id) {
        $user = DB::table('users')->where('userid', $user_id)->first();
        return (isset($user->username) ? $user->username : '');
    }
}
