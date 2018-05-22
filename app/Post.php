<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    
    public function tags(){
        return $this->belongsToMany(\App\Tag::class);
    }
    public function comments(){
        return $this->hasMany(\App\Comment::class);
    }
    public function category(){
        return $this->belongsTo(\App\Category::class);
    }
}
