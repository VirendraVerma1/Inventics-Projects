<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
