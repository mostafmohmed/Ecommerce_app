<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Wishlists;
use Illuminate\Http\Request;

class wishlistController extends Controller
{
  public function delete($id){
$wishlist=Wishlists::find($id);
if (!$wishlist) {

return response()->json(['status'=>false]);
}
$wishlist->delete();
return response()->json(['status'=>true]);

  }
}
