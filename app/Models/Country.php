<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations ;
    protected $guarded = [];
    protected $translatable =['name']; 

        public function Governreats(){
            return $this->hasMany(Governreate::class,'country_id');
        }

        public function getIsActiveAttribute($value){
            if(Config::get('app.local')=='ar'){
                return $value==1?'مفعل':'غير مفعل';
            }
             return $value==1?'Active' : 'Inactive';
        }
}
