<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallyClerk extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function operation_station(){
        return $this->hasOne('App\Models\OperationStation', 'id', 'operation_station_id');
    }

    public function ships(){
        return $this->hasMany('App\Models\TallyClerkShip', 'tally_clerk_id', 'id');
    }

    public function tallybook(){
        return $this->hasMany('App\Models\TallyBook', 'tally_clerk_id', 'id');
    }
}
