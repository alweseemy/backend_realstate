<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_check extends Model
{
    use HasFactory;

    public function bank(){
        return $this->hasOne('App\Models\Bank','id','bank_id');
    }

    public function flat(){
        return $this->hasOne('App\Models\Flat','id','flat_id');
    }
    public function contract(){
        return $this->hasOne('App\Models\Contract','id','contract_id');
    }
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
