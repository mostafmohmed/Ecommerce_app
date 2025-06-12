<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class Contactcontroller extends Controller
{
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
    $massages=Contact::get();
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
