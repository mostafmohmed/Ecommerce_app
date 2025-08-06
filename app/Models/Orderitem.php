<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
          protected $guarded = [];

          public function product(){
            return $this->belongsTo(Broduct::class,'prodect_id');
          }
}
