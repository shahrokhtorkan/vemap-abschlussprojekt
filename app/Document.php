<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * Define relationship to User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Define relationship to Patient
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient() {
        return $this->belongsTo('App\Patient');
    }
}
