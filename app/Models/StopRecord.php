<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StopRecord extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'created_by_user_id');
    }

    public function basement(){
        return $this->hasOne('App\Models\Basement', 'id', 'basement_id');
    }

}
