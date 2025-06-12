<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\services\front\homeserveices;
use App\services\front\produectserveices;
use Illuminate\Http\Request;

class ProduectController extends Controller
{
    public $homeserveices;
    public $produectserveices;       
  
  public function __construct(homeserveices $homeserveices,produectserveices $produectserveices) {
    $this->homeserveices = $homeserveices;
       $this->produectserveices = $produectserveices;
  }
  public function showproduect($slug){
$produect= $this->produectserveices->getproduectByslug($slug);
return $produect;
  }
    public function prodectype($type){
        if ($type=='flashproduect') {
     $products=   $this->homeserveices->getFlashproduects();
      $data = $products->map(function($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'discount' => $item->discount,
                'url' => route('website.produect', $item->slug),
            'has_variants' => $item->has_variants,
            'image' => $item->images->first() ? asset('uploads/produect/'.$item->images->first()->file_name) : null
        ];
    });
     return response()->json($data);
        }elseif($type=='newArraval'){

 $products=   $this->homeserveices->newArravalproduects();
     $data = $products->map(function($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'discount' => $item->discount,
            'has_variants' => $item->has_variants,
                'url' => route('website.produect', $item->slug),
            'image' => $item->images->first() ? asset('uploads/produect/'.$item->images->first()->file_name) : null
        ];
    });
     return response()->json($data);
        }elseif( $type=='FlashWithTimer' ){
            
            $products=   $this->homeserveices->getFlashproduectsWithTimer();
             $data = $products->map(function($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'discount' => $item->discount,
            'has_variants' => $item->has_variants,
                'url' => route('website.produect', $item->slug),
            'image' => $item->images->first() ? asset('uploads/produect/'.$item->images->first()->file_name) : null
        ];
    });
            return response()->json( $data);   
        }else{
return response()->json('null');
        }
        
    }
}
