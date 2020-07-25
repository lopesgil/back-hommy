<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    public function chosen_ad() {
        return $this->belongsTo('App\Ad');
    }
}
