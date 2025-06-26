<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Config;

class Coupons extends Model
{
    
    protected $guarded = [];
    use HasFactory;
    public function scopeValid($query){
        return $query->where('is_active',1)->where('time_used','<','limit')->where('end_data','>',now());
    }
    public function getIsActiveAttribute($value){
if (Config::get('app.local')=='ar') {
return $value ==1?'مفعل':'غير مفعل';
}
return $value ==1?'Active':'In Active';
}
}
