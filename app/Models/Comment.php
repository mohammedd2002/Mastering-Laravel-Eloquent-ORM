<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';
    public $guarded = ['id'];

    
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
