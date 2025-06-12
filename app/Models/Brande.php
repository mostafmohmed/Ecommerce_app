<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Brande extends Model
{
    use HasTranslations ;
    protected static function boot()
{
    parent::boot();

    static::creating(function ($brande) {
        $brande->slug = Str::slug($brande->name);
    });
}
    protected $translatable =['name']; 
    protected $guarded = [];
    public function products(){
        return $this->hasMany(Broduct::class,'brand_id');
    }
}
