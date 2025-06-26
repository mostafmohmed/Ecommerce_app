<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Broduct;
use App\Models\Cart;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function coponadd(Request $request){

 $coupons=  Coupons::where('code',$request->copon)->first();
 if (!$coupons) {
        return response()->json(['status' => false, 'message' => 'Coupon not found']);
    }

    // ربط الكوبون بالعربة
    auth()->user()->cart()->update(['copons' => $coupons->code]);

    // تعديل عدد مرات الاستخدام
    $coupons->update([
        'time_used' => $coupons->time_used - 1
    ]);

    // إعادة الكوبون المعدل في الاستجابة
    return response()->json([
        'status' => true,
        'message' => 'Coupon applied successfully',
        'coupon' => $coupons->fresh()  // fresh() للحصول على البيانات المحدثة من قاعدة البيانات
    ]);
    }


    public function delete($id){
$cart = Cart::find($id);
if ($cart ) {
 $cart->delete();   
   return response()->json(['status'=>true]);
}
   return response()->json(['status'=>false]);


    }
   public function add(Request $request, $id)
{
    $product = Broduct::find($id);

    if (!$product) {
        return response()->json(['status' => false, 'message' => 'المنتج غير موجود'], 404);
    }

    $user = auth()->user();
    $quantity = $request->input('quantity', 1);
    $variantId = $request->input('variant_id');
    // تحقق من وجود الكمية المتاحة
    if ($variantId) {
        $variant = $product->variants()->find($variantId);

        if (!$variant) {
            return response()->json(['status' => false, 'message' => 'المتغير غير موجود'], 400);
        }

        if ($variant->stock < $quantity) {
            return response()->json(['status' => false, 'message' => 'الكمية غير متوفرة في المخزون'], 400);
        }
    } else {
        if ($product->quantity < $quantity) {
            return response()->json(['status' => false, 'message' => 'الكمية غير متوفرة في المخزون'], 400);
        }
    }

    $cartItem = $user->cart()->where('product_id', $id)
                      ->when($variantId, fn($q) => $q->where('variant_id', $variantId))
                      ->first();

    if ($cartItem) {
      $cartItem->quantity = $quantity;
    $cartItem->price = ($variantId ? $variant->price : $product->price) * $quantity;
    $cartItem->save(); 
    } else {
        $user->cart()->create([
            'product_id' => $id,
            'variant_id' => $variantId??null,
            'quantity' => $quantity,
            'price' => $variantId ? $variant->price : $product->price,
        ]);
    }

    // خصم الكمية من المخزون
    if ($variantId) {
        $variant->stock -= $quantity;
        $variant->save();
    } else {
        $product->quantity -= $quantity;
        $product->save();
    }

    $count = $user->cart()->count();

    return response()->json([
        'status' => true,
        'message' => 'تمت الإضافة إلى السلة',
        'cart_count' => $count
    ]);
}

  
  
}


