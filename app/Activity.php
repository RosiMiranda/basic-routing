<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function routers(){

        return $this->hasMany(Router::class);
    }
}
