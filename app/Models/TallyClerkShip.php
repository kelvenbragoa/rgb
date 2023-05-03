<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TallyClerkShip extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ship(){
        return $this->hasOne('App\Models\Ship', 'id', 'ship_id');
    }

    

    public function tallyclerk(){
        return $this->hasOne('App\Models\TallyClerk', 'id', 'tally_clerk_id');
    }

    public function shiftship(){
        return $this->hasOne('App\Models\ShiftShip', 'id', 'shift_ship_id');
    }

    public function tallybook(){
        return $this->hasMany('App\Models\TallyBook', 'tally_clerk_ship_id', 'id');
    }

   
}
