<?php

namespace App\services\front;

use App\Models\Broduct;

class produectserveices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getproduectByslug($slug){
        return Broduct::with(['images','brand','category'])->where('slug',$slug)->first();      
    }
    public function newArravalproduects($limit){
      return Broduct::with(['images','brand','category'])->latest()->paginate($limit);    
    }
     public function getFlashproduectsWithTimer($limit=3){
        return Broduct::with(['images','brand','category'])->discounted()->where('available_for',date('Y-m-d'))->latest()->paginate($limit);

    }
    public function getFlashproduects($limit=null){
        return Broduct::with(['images','brand','category'])->discounted()->latest()->limit($limit)->get();

    }
}
