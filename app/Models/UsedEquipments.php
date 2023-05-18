<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedEquipments extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'created_by_user_id');
    }
}
