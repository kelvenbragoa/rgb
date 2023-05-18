<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function customer(){
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }

    public function agent(){
        return $this->hasOne('App\Models\Agent', 'id', 'agent_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'created_by_user_id');
    }

    public function type_operation(){
        return $this->hasOne('App\Models\TypeOperation', 'id', 'type_operation_id');
    }

    public function type_merchandise(){
        return $this->hasOne('App\Models\TypeMerchandise', 'id', 'type_merchandise_id');
    }

    public function shifts(){
        return $this->hasMany('App\Models\ShiftShip', 'ship_id', 'id');
    }

    public function basements(){
        return $this->hasMany('App\Models\Basement', 'ship_id', 'id');
    }

    public function tallybook(){
        return $this->hasMany('App\Models\TallyBook', 'ship_id', 'id');
    }

    public function stops(){
        return $this->hasMany('App\Models\StopRecord', 'ship_id', 'id')->where('status',1);
    }

    public function operation_station(){
        return $this->hasOne('App\Models\OperationStation', 'id', 'operation_station_id');
    }

    public function equipments(){
        return $this->hasMany('App\Models\UsedEquipments', 'ship_id', 'id')->where('status',1);
    }

    
}
