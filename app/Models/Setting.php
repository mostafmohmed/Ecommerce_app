<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{

    use HasTranslations ;
 
    protected $guarded = [];
    protected $translatable =['site_name','site_desc']; 
}
