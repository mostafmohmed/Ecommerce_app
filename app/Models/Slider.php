<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    //notes
    use HasTranslations ;
 
    protected $guarded = [];
    protected $translatable =['notes']; 
    public function getFileNameAttribute($file_name){
return 'uploads/sliders/'.$file_name;
    }
    public function getCreatedAtAttribute($value){
        return date('d-m-Y h:i a',strtotime($value)) ;
            }
}
