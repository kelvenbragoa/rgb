<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallyBook extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ship(){
        return $this->hasOne('App\Models\Ship', 'id', 'ship_id');
    }

    public function shiftship(){
        return $this->hasOne('App\Models\ShiftShip', 'id', 'shift_ship_id');
    }

    public function basement(){
        return $this->hasOne('App\Models\Basement', 'id', 'basement_id');
    }

    public function destination(){
        return $this->hasOne('App\Models\Destination', 'id', 'destination_id');
    }

    public function typeofbag(){
        return $this->hasOne('App\Models\TypeOfBag', 'id', 'type_of_bag_id');
    }

    public function tallyclerk(){
        return $this->hasOne('App\Models\TallyClerk', 'id', 'tally_clerk_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'created_by_user_id');
    }

    public function type_merchandise(){
        return $this->hasOne('App\Models\TypeMerchandise', 'id', 'type_merchandise_id');
    }
}
