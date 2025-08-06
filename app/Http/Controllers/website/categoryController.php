<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\services\front\homeserveices;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    
    public $homeserveices;
  
  public function __construct(homeserveices $homeserveices) {
    $this->homeserveices = $homeserveices;
  }
  public function getproudectsBycategory($slug){
    $produects=$this->homeserveices->getProduectBycatecory($slug);
    if ( !$produects) {
       abort(404);
    }
    return  view('website.category.produect',compact('produects'));
  }
   public function categoriesall(Request $request){
   
  $categories=   $this->homeserveices->Categories() ;
   
 
    
    return response()->json($categories);
    
  }
  
}
