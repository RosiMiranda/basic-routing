<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    public function interfaces(){

        return $this->hasMany(RouterInterface::class);
    }
}
