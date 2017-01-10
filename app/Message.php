<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {
    protected $guarded = [];

    public function user() {
        return $this->hasOne('App\User', 'id', 'from_id');
    }
}
