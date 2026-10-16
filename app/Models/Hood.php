<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hood extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','city_id'
    ];


    public function city(){
        return $this->hasOne('App\Models\City','id','city_id');
    }
}
