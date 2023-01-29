<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
     public function driver()
    {
        return $this->hasOne('App\Driver');
    }
}
