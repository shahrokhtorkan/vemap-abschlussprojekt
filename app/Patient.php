<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * Define relationship to Document
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents() {
        return $this->hasMany('App\Documentation');
    }

    /**
     * Define relationship to Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments() {
        return $this->hasMany('App\Appointment');
    }
}
