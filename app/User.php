<?php

namespace App;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function document()
    {
        return $this->hasMany('App\Document');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * @return string[]
     */
    public function getRoleNames()
    {
        $result = [];
        foreach ($this->roles as $role) {
            array_push($result, $role->name);
        }
        return $result;
    }

    /**
     * @return string[]
     */
    public function getPermissionNames()
    {
        $result = [];
        foreach ($this->roles as $role) {
            $result = array_merge($role->getPermissionNames(), $result);
        }
        return $result;
    }

    /**
     * @param string $permissionName
     * @return bool
     */
    public static function hasPermission(string $permissionName): bool
    {
        $currentUser = auth()->user();
        if ($currentUser) {
            $currentUserPermissionNames = $currentUser->getPermissionNames();
            return in_array($permissionName, $currentUserPermissionNames) ? true : false;
        } else {
            return false;
        }
    }

    /**
     * @param string $permissionName
     * @throws AuthorizationException
     */
    public static function requirePermission(string $permissionName)
    {
        $currentUser = auth()->user();
        if (!$currentUser) {
            throw new AuthorizationException("Not logged in, so user does not have the '{$permissionName}' permission.");
        } elseif (!$currentUser->hasPermission($permissionName)) {
            throw new AuthorizationException("User '{$currentUser->name}' does not have '{$permissionName}' permission.");
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function patient()
    {
        return $this->hasOne('App\Patient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    /**
     * @param $userRoleName
     */
    public function addRole($userRoleName): void
    {
        if (!$this->id) {
            throw new \Exception("Please save the object before trying to access its relations.");
        }
        $role = Role::where('name', $userRoleName)->firstOrFail();
        $this->roles()->attach($role->id);
    }

    public static function hasRole($roleName): bool
    {
        $user = Auth::user();
        if ($user && $user->roles()->where('name', $roleName)->count() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
