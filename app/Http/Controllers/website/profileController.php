<?php

namespace App\Http\Controllers\website;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Produect_previews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Predis\Configuration\Option\Prefix;

class profileController extends Controller
{
    public function reviewupdate(Request $request,$id){
        $review = Produect_previews::findOrFail($id);
    $review->comment = $request->input('comment');
    $review->save();

    return response()->json(['success' => true, 'comment' => $review->comment,]);

    }
    public function reviewstore(Request $request){
 $rewiew=Produect_previews::create([
    'user_id'=>auth()->user()->id,
        'produect_id'=>$request->product_id,
        'comment'=>$request->comment,

]);
if ($rewiew) {
   return response()->json(['status'=>true]);
}
    }
    public function usersections($section){
    switch ($section) {
        // case 'orders':
        //     $orders = auth()->user()->orders()->with('orderitems.product')->get();
        //     return view('website.user.sections.orders', compact('orders'));
         case 'perview':
            $perview=auth()->user()->perview()->with('produect.images')->get();

            return view('website.Dasghboard.perview',compact('perview'));

     case 'change-password':
            

            return view('website.Dasghboard.changepassword');

        case 'order':
             $orderusers = auth()->user()
    ->orders()
    ->with('orderitems.product')
    ->get();

            return view('website.Dasghboard.order',compact('orderusers'));

        case 'wishlist':
            $wishlist = auth()->user()->wishlist; // حسب موديلك
            return view('website.Dasghboard.wishlist',compact('wishlist'));
        case 'dashpoard':
          
            return view('website.Dasghboard.dashbolard');

        default:  
            return view('website.Dasghboard.Empty');
    }

    }
    public function index(){
        return view('website.userprofile');
    }
    public function getUserOrders()
{
    // $orders = Order::where('user_id', Auth::id())->with('orderitems')->get();
$orderusers = auth()->user()
    ->orders()
    ->with('orderitems.product')
    ->get();
   // return response()->json($orderusers);
   return response()->json($orderusers);
}
public function changePassword(Request $request)
{
        $validator = Validator::make($request->all(), [
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);
 if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    $user = auth()->user();

    if (!Hash::check($request->current_password, $user->password)) {
        return response()->json(['message' => 'كلمة المرور الحالية غير صحيحة.'], 422);
        }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return response()->json(['message' => 'تم تغيير كلمة المرور بنجاح']);
}


}
