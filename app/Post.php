<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    
    public function tags(){
        $this->hasMany(\App\Tag::class);
    }
}
