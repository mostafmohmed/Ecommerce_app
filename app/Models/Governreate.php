<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governreate extends Model
{
    use HasTranslations ;
    protected $guarded = [];
    protected $translatable =['name']; 
    public function cities(){
        return $this->hasMany(City::class,'governreate_id');
    }
    
    public function country(){
        return $this->belongsTo(country::class,'country_id');
    }
    public function users(){
        return $this->hasMany(User::class,'governorate_id');
    }
    public function getcitiescount(){
        return $this->cities->count();
    }
    public function getuserscount(){
        return $this->users->count();
    }
    public function shippingPrice(){
        return $this->hasOne(ShappingGovernrate::class , 'governrate_id');
    }
    public function getstatus(){
        if (app()->getLocale()=='ar') {
           if ($this->status==1) {
           return 'مفعل';
           }else{
            return 'غير مفعل' ;
           }
          
            # code...
        }
        if (app()->getLocale()=='en') {
            if ($this->status==1) {
            return 'Active';
            }else{
             return '  In active ' ;
            }
           
           
         }
    }
}
