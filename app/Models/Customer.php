<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ships(){
        return $this->hasMany('App\Models\Ship', 'customer_id', 'id');
    }
}
