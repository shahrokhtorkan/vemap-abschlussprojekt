<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions() {
        return $this->belongsToMany('App\Permission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function getPermissionNames()
    {
        $result=[];
        foreach($this->permissions as $permission) {
            array_push($result, $permission->name);
        }
        return $result;
    }
}
