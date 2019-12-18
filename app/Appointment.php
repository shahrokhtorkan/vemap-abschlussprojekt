<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Appointment extends Model
{
    public const STATUS = [ 'available', 'reserved', 'confirmed' ];

    /** @var array Laravel will cast those to Carbon instances automatically */
    protected $dates = [
        'start',
        'end'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    /**
     * @param $numberOfDays
     * @return array
     */
    public static function getNextWorkingDays($numberOfDays) {
        $now = Carbon::now();
        $dates=[];
        for($i=0;$i<$numberOfDays;++$i) {
            $date = $now->copy()->addDays($i);
            if($date->dayOfWeekIso>=6) {
                continue;
            } else {
                array_push($dates, $date);
            }
        }
        return $dates;
    }

    /**
     * @return Collection
     */
    public static function getMyConfirmedSlots() {
        $user = auth()->user();
        $patient = $user->patient;
        if($patient) {
            $result =$patient->appointments()->whereIn('status', ['reserved', 'confirmed'])->get();
        } else {
            $result=new Collection();
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public static function getAvailableSlots() {
        return Appointment::where('status', 'available')->get();
    }
}
