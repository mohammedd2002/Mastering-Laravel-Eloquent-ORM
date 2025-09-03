<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    public $table = 'serials';
    public $guarded = ['id'];

    public function phone(){
        return $this->belongsTo(Phone::class);
    }
}
