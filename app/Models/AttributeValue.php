<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AttributeValue extends Model
{
    use HasTranslations ;
    protected $guarded = [];
    protected $translatable =['value']; 
      public function attribut(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
}
