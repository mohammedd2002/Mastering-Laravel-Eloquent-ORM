<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public $table = 'phones';
    public $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function serial(){
        return $this->hasOne(Serial::class);
    }
}
