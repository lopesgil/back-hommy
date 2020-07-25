<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    public function ad() {
        return $this->belongsTo('App\Ad');
    }

    public function savedAds() {
        return $this->belongsToMany('App\Ad')->withTimestamps();
    }
}
