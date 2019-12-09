<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function documents() {
        return $this->hasMany('App\Documentation');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }
}
