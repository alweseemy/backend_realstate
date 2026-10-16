<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function unit(){
        return $this->hasOne('App\Models\Unit','id','unit_id');
    }

    public function flat(){
        return $this->hasOne('App\Models\Flat','id','flat_id');
    }

    public function type(){
        return $this->hasOne('App\Models\Order_type','id','order_type');
    }

    public function owner(){
        return $this->hasOne('App\Models\User','id','owner_id');
    }
}
