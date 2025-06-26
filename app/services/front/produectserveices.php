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
    public function getRelatedProduectByslug($slug,$limit=null){
         $broduct = Broduct::with(['images','brand','category'])
            ->where('slug', $slug)
            ->first();

if (!$broduct || !$broduct->category) {
    return null;
}

// نحصل على المنتجات من نفس التصنيف (بدون تكرار المنتج نفسه إن أردت)
return $broduct->category
            ->products()
            ->where('id', '!=', $broduct->id) // لا تجلب نفس المنتج
            ->with(['images','brand','category'])
            ->latest()
            ->paginate($limit ); 
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
