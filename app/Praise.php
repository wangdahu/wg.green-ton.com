<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{

    protected $fillable = ['user_id', 'news_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    // public function news() {
    //     return $this->belongsTo('App\News');
    // }


}
