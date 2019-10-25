<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function admin() {
        return $this->hasMany('App/Admin');
    }
}
