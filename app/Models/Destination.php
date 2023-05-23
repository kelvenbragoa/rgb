<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tallybook(){
        return $this->hasMany('App\Models\TallyBook', 'destination_id', 'id');
    }

    public function ship(){
        return $this->hasOne('App\Models\Ship', 'id', 'ship_id');
    }
}
