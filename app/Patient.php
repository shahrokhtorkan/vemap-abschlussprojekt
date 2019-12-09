<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function documentations() {
        return $this->hasMany('App\Documentation')->orderBy('id', 'desc')  ;
    }

    public function slots() {
        return $this->hasMany('App\Slot');
    }
}
