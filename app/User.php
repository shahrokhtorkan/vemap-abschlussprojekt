<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    /**
     * One User has many Documents
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    /**
     * One User has more Appointments or no Appointments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function addRole(string $roleName) {
        $role = Role::where('name', $roleName)->firstOrFail();
        $this->roles()->save($role);
    }

    public function hasRole(string $roleName) {
        $result = false;
        foreach (auth()->user()->roles as $role) {
            if($role->name == $roleName) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    public function hasPermission(string $permissionName): bool {

        $hasPermission = false;

        foreach($this->roles as $role) {
            if($role->hasPermission($permissionName)) {
                $hasPermission=true;
                break;
            }
        }

        return $hasPermission;

    }
}
