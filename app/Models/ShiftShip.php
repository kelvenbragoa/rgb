<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftShip extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function shift(){
        return $this->hasOne('App\Models\Shift', 'id', 'shift_id');
    }

    public function ship(){
        return $this->hasOne('App\Models\Ship', 'id', 'ship_id');
    }

    public function tallyclerkship(){
        return $this->hasMany('App\Models\TallyClerkShip', 'shift_ship_id', 'id');
    }

    public function tallybook(){
        return $this->hasMany('App\Models\TallyBook', 'shift_ship_id', 'id');
    }

    public function stops(){
        return $this->hasMany('App\Models\StopRecord', 'shift_ship_id', 'id')->where('status',1);
    }

    public function equipments(){
        return $this->hasMany('App\Models\UsedEquipments', 'shift_ship_id', 'id')->where('status',1);
    }
}
