<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerBankAccount extends Model
{
    use HasFactory;


    public function bank(){
        return $this->hasOne('App\Models\Bank','id','bank_id');
    }
}
