<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model {
    public function user() {
        return $this->hasOne('App\User', 'id', 'friend_id');
    }
}