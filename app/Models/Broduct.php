<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Broduct extends Model
{
    use HasTranslations ;
    protected $guarded = [];
    protected $translatable =['name','small_desc','desc']; 
    public function variants()
    {
        return $this->hasMany(ProductVariant::class,'product_id');
    }
    public function images(){
        return $this->hasMany(Produect_image::class,'prodect_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function price(){
        if (app()->getLocale()=='ar') {
            return $this->has_variants==false? number_format($this->price,2):'ليس لدية متغير';
        }
        if (app()->getLocale()=='en') {
            return $this->has_variants==false? number_format($this->price,2):' do,nt has variants';
        }

    }
    public function isSimple()
 {
        return !$this->has_variants;
    }
    public function status(){
        if (app()->getLocale()=='ar') {
            return $this->status==0?'غير مفعل':'مفعل';
        }
        if (app()->getLocale()=='en') {
            return  $this->status==0?'not active':' active';
        }
    }
    public function quantity(){
        if (app()->getLocale()=='ar') {
            return $this->has_variants==false? $this->quantity:'ليس لدية متغير';
        }
        if (app()->getLocale()=='en') {
            return $this->has_variants==false? $this->quantity:' do,nt has variants';
        }

    }
    public function brand(){
        return $this->belongsTo(Brande::class,'brand_id');
    }
    public function hasvraint(){
        if (app()->getLocale()=='ar') {
            return $this->has_variants==true?'لدية متغير':'ليس لدية متغير';
        }
        if (app()->getLocale()=='en') {
            return $this->has_variants==true?'has variants':' do,nt has variants';
        }
      
    }
}
