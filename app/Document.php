<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * Define relationship to user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Define relationship to patient
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient() {
        return $this->belongsTo('App\Patient');
    }
}
