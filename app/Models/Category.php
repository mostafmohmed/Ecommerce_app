<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
   
    use Sluggable;
    use HasTranslations ;
    protected $translatable =['name']; 
    protected $guarded = [];
    protected $table='categories';
    public function products(){
        return $this->hasMany(Broduct::class,'category_id');
    }
    public function getLogoAttribute($logo){
        return   asset("uploads/category/$logo") ;
            }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
