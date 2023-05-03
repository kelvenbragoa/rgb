<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMerchandise extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function ship(){
        return $this->hasMany('App\Models\Ship', 'type_merchandise_id', 'id');
    }

    public function tallybook(){
        return $this->hasMany('App\Models\TallyBook', 'type_merchandise_id', 'id');
    }
}
