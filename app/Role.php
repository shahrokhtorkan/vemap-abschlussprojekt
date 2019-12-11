<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions() {
        return $this->belongsToMany('App\Permission');
    }

    public function hasPermission(string $permissionName): bool {

        $hasPermission = false;

        foreach($this->permissions as $permission) {
            if($permission->name == $permissionName) {
                $hasPermission = true;
                break;
            }
        }

        return $hasPermission;
    }
}
