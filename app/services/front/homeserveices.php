<?php

namespace App\services\front;

use App\Models\Brande;
use App\Models\Broduct;
use App\Models\Category;

class homeserveices
{
    /**
     * Create a new class instance.
     */
  public  $produectserveices;
    public function __construct(produectserveices $produectserveices)
    {
       $this->produectserveices=$produectserveices;
    }
    public function Categories($limit=null){
        if($limit!=null){
$categories = Category::limit($limit)->get();
return $categories;
        }
$categories = Category::get();
return $categories;

    } 
      public function getProduectBycatecory ($slug){

$Category=Category::where('slug',$slug)->firstOrFail();
$proudect=$Category->products()->with(['variants','images','category'])->active()->latest()->paginate(2);
return $proudect;
    }
   
    public function getProductByBrand ($slug){

$brand=Brande::where('slug',$slug)->firstOrFail();
$proudect=$brand->products()->with(['variants','images','category'])->active()->latest()->paginate(2);
return $proudect;
    }
    public function newArravalproduects($limit=null){
return $this->produectserveices->newArravalproduects($limit);
    }
     public function getFlashproduects($limit=null){
return $this->produectserveices->getFlashproduects($limit);
    }
     public function getFlashproduectsWithTimer($limit=null){
return $this->produectserveices->getFlashproduectsWithTimer($limit);
    }
    
}
