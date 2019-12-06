<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    // protected $fillable = [] -- here, we'll put fillables to avoid mass assignment errors

    public function user()
    {
        return($this->belongsTo('App\User'));
    }
}
