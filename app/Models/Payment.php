<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    public function unit(){
        return $this->hasOne('App\Models\Unit','id','unit_id');
    }

    public function flat(){
        return $this->hasOne('App\Models\Flat','id','flat_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function owner(){
        return $this->hasOne('App\Models\User','id','owner_id');
    }
}
