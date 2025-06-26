<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        protected $guarded = [];

    public function orderitems(){
        return $this->hasMany(Orderitem::class,'oreder_id');
    }
}
