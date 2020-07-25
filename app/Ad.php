<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function landlord() {
        return $this->belongsTo('App\Landlord');
    }

    public function tenants() {
        return $this->hasMany('App\Tenant');
    }

    public function savedTenants() {
        return $this->belongsToMany('App\Tenant')->withTimestamps();
    }
}
