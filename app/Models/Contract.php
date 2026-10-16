<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function unit(){
        return $this->hasOne('App\Models\Unit','id','unit_id');
    }

    public function flat(){
        return $this->hasOne('App\Models\Flat','id','flat_id');
    }

    public function owner(){
        return $this->hasOne('App\Models\User','id','owner_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payment','contract_id','id');
    }

    public function checks(){
        return $this->hasMany('App\Models\Bank_check','contract_id','id');
    }

    public function garage(){
        return $this->hasOne('App\Models\Flat','id','garage_id');
    }

    public function bank(){
        return $this->hasOne('App\Models\Bank','id','bank_id');
    }
}
