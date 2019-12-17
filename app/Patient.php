<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function documents() {
        return $this->hasMany('App\Document')->orderBy('id', 'desc')  ;
    }

    public function user() {
        return $this->hasOne('App\User');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

}
