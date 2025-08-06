<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Brande;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getproudectsByBrand($slug){
        $Category=Brande::where('slug',$slug)->firstOrFail();
$produect=$Category->products()->with(['variants','images','category'])->active()->latest()->paginate(2);
return view('website.brand.produect',compact('produect'));
    } 
   public function brandeAll(Request $request){
   
  $brand=  Brande::all();
   
 
    
    return response()->json($brand);
    
  }
}
