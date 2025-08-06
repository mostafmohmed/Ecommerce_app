<?php

namespace App\Http\Controllers\rwebsite;

use App\Http\Controllers\Controller;
use App\Models\Wishlists;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class WishlistController extends Controller
{
   public function index(){
      return view('website.wishlist');
   }
   public function store($id){
 $wishlist= Wishlists::create([
    'produect_id'=>$id,
    'user_id'=>Auth::id(),
]);
if ($wishlist) {
   return response()->json(['status'=>true]);
}else {
   return response()->json(['status'=>false]);
}
  return response()->json(['status'=>false]);
   }
   public function destroy($id){
      $wishlist=  auth()->user()->wishlist()->detach($id);
         if ($wishlist) {
            // $wishlist->delete();

   return response()->json(['status'=>true]);
}else {
   return response()->json(['status'=>false]);
}
   }
}
