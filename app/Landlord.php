<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    public function ads(){
        return $this->hasMany('App\Ad');
    }
}
