<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class Contactcontroller extends Controller
{

public function Delete($id){
    $Contact = Contact::findOrFail($id);

    try {
        $Contact->delete();

        return response()->json([
            'status' => true,
            'message' => 'خذف موقت',
            'id' => $id,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Error: ' . $e->getMessage(),
        ]);
    }  
}
public function forceDelete($id){
    $Contact = Contact::withTrashed()->findOrFail($id);

    try {
        $Contact->forceDelete();

        return response()->json([
            'status' => true,
            'message' => 'Deleted permanently',
            'id' => $id,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Error: ' . $e->getMessage(),
        ]);
    }
}

    public function mark_unreade($id){
        $massages=Contact::find($id);
        if ($massages->is_reade==1) {
            $massages->update([
                'is_reade'=>0
            ]);
          return response()->json(['status'=>true,'mark'=> $massages]);
        }
    }
   public function massages(){
    // dd(auth()->guard('admin')->user()); // ← أو 'web' حسب guard المستخدم
    $massages=Contact::withTrashed()->get();
    // dd( $massages);
    return view('dashboard.contact.index',compact('massages'));
   }
   public function search(Request $request)
{
    $query = $request->get('query');

    $messages = Contact::with('user')->where('name', 'LIKE', "%{$query}%")
        ->orWhere('massage', 'LIKE', "%{$query}%")
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json($messages);
}
public function contact_details($id){
    $comtact=Contact::find($id);
    return response()->json(['massage'=>$comtact]);

}
}
