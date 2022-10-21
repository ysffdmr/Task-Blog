<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
