<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    protected $inquiries = [
       'name', 'email', 'phone','service','q1','q2','q3','q4','q5','status'
    ];
}
