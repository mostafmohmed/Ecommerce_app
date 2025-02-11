<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Brande extends Model
{
    use HasTranslations ;
    protected $translatable =['name']; 
    protected $guarded = [];
    public function products(){
        return $this->hasMany(Broduct::class,'brand_id');
    }
}
