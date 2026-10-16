<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'unittype_id',
        'uses',
        'floors_number',
        'city_id',
        'hood_id',
        'postal_code',
        'owner_id',
        'extra_number',
        'building_number',
        'deed_number',
        'electric_meter',
        'sewage_meter',
        'water_meter',
        'address',
        'latitude',
        'longitude',

    ];


    public function unit_type(){
        return $this->hasOne('App\Models\UnitType','id','unittype_id');
    }

    public function owner(){
        return $this->hasOne('App\Models\User','id','owner_id');
    }
    public function guard_persson(){
        return $this->hasOne('App\Models\User','id','guard_id');
    }


    public function argument(){
        return $this->hasOne('App\Models\Agreement','unit_id','id');
    }

    public function city(){
        return $this->hasOne('App\Models\City','id','city_id');
    }

    public function hood(){
        return $this->hasOne('App\Models\Hood','id','hood_id');
    }
    public function flats(){
        return $this->hasMany('App\Models\Flat','unit_id','id');
    }

    public function service_contract(){
        return $this->hasMany('App\Models\Service_contract','unit_id','id');
    }

}
