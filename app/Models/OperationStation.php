<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationStation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ship(){
        return $this->hasMany('App\Models\Ship', 'operation_station_id', 'id');
    }

    public function tallybook(){
        return $this->hasMany('App\Models\TallyBook', 'operation_station_id', 'id');
    }
}
