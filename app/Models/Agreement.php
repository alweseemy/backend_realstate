<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;



    public function unit(){
        return $this->hasOne('App\Models\Unit','id','unit_id');
    }


    public function owner(){
        return $this->hasOne('App\Models\User','id','owner_id');
    }


}
