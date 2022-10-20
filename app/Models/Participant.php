<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public function event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
    public function transaction(){
        return $this->belongsTo(Participant::class, 'invoice_id', 'invoice_id');
    }

}
