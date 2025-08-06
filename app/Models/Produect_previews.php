<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produect_previews extends Model
{
    //user_id
        protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
     public function produect(){
        return $this->belongsTo(Broduct::class,'produect_id');
    }
}
