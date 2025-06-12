<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\services\front\homeserveices;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
  public $homeserveices;
  
  public function __construct(homeserveices $homeserveices) {
    $this->homeserveices = $homeserveices;
  }
  public function home(){
    $slider=Slider::all();
    $categories=   $this->homeserveices->Categories(2) ;
   
    $newArravalproduects= $this->homeserveices->newArravalproduects(2);
     $getFlashproduects= $this->homeserveices->getFlashproduects(2);
     $getFlashproduectsWithTimer= $this->homeserveices->getFlashproduectsWithTimer(2);

    return view('website.home',compact('slider','categories','newArravalproduects','getFlashproduects','getFlashproduectsWithTimer'));
  }
 
  public function getproduectsbybrande($slug){
 $produet= $this->homeserveices->getProductByBrand($slug);
return view('website.brande',compact('produet'));
  }
}
