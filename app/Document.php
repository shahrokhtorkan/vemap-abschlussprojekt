<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function patient() {
        return $this->belongsTo('App\Patient', 'patient_id');
    }
}
