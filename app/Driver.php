<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
     public function vehicle()
    {
        return $this->hasOne('App\Vehicle');
    }
}
