<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasTranslations ;
    protected $translatable =['role']; 
    protected $guarded = [];
    public function admins()
    {
        return $this->hasMany(Admin::class , 'role_id');
    }
    
    public function getpermessionAttribute($value)
    {
        return json_decode($value);
    }
}
