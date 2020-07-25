<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function landlord() {
        return $this->belongsTo('App\Landlord');
    }

    public function tenants() {
        return $this->hasMany('App\Tenants');
    }
}
