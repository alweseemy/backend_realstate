<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function unit(){
        return $this->hasOne('App\Models\Unit','id','unit_id');
    }

    public function bank(){
        return $this->hasOne('App\Models\Bank','id','bank_id');
    }

    public function flat(){
        return $this->hasOne('App\Models\Flat','id','flat_id');
    }

    public function invoicetype(){
        return $this->hasOne('App\Models\Invoicetype','id','type');
    }

    public function contract(){
        return $this->hasOne('App\Models\Contract','id','contract_id');
    }

    public function owner(){
        return $this->hasOne('App\Models\User','id','owner_id');
    }

    public function manger(){
        return $this->hasOne('App\Models\User','id','manger_id');
    }
}
