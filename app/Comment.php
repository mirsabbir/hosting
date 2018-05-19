<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    public function post(){
        $this->belongsTo(\App\Post::class);
    }
}
