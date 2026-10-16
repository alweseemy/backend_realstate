<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    // Relation With Countries Table
    public function city_country(){
        return $this->hasOne('App\Models\Country','id','country_id');
    }

    // Relation With Table States
    public function states(){
        return $this->hasMany('App\Models\State','city_id','id');
    }

    // Relation With Branches
    public function branches(){
        return $this->hasMany('App\Models\Branch','city_id','id');
    }


}
