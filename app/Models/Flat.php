<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'unit_id',
        'flat_type_id',
        'unit_number',
        'area',
        'electric',
        'water',
        'room',
        'hall',
        'bathroom',
        'floor',

    ];

    public function unit(){
        return $this->hasOne('App\Models\Unit','id','unit_id');
    }

    public function contract(){
        return $this->hasOne('App\Models\Contract','flat_id','id');
    }

    public function flattype(){
        return $this->hasOne('App\Models\Flat_type','id','flat_type_id');
    }


}
