<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * One User is one Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * One Patient has many Documents
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Document')->orderBy('id', 'desc');
    }

    /**
     * One Patient has more Appointments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
