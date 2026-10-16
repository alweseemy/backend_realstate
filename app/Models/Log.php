<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    // Relation with users table
    public function user_log(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

}
