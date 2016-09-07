<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['content', 'published_at', 'user_id'];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function praises(){
        return $this->hasMany('App\Praise');
    }
}
