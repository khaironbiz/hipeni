<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function answer_type(){
        return $this->belongsTo(Answer_type::class,'answer_type_id','id');
    }
    public function training(){
        return $this->belongsTo(Training::class,'training_id','id');
    }
    public function answer(){
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
    public function kunci(){
        return $this->belongsTo(Answer::class, 'jawaban', 'id');
    }

}
