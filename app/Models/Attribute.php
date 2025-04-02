<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
    use HasTranslations ;
    protected $guarded = [];
    protected $translatable =['name']; 
    public function attributrvalues(){
        return $this->hasMany(AttributeValue::class,'attribute_id');
    }
}
