<?php

namespace App\Http\Controllers\Dashboard\auth;
use Ichtrojan\Otp\Otp;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\sendotp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class restpasswordcontroller extends Controller
{
    public function showemailform(){
        return view('dashboard.auth.password.email');
       }
       public function sendotp(Request $request){
        $request->validate(['email'=>['required','email']]);
        $email=Admin::where('email',$request->email)->first();
        if (! $email) {
           return redirect()->back()->withErrors(['email'=>'try agin']);
        }
        $email->notify( new sendotp());
    return redirect()->route('dashpoard.showotpform', ['email'=>$request->email]);
       }
       public function showotpform($email){
    
    return view('dashboard.auth.password.showotp',compact('email'));
       }
       public function verfiyotp(Request $request){
        $request->validate([
            'email'=>['required'],
            'token'=>['required'],
    
        ]);
      
      $otp= (new Otp)->validate($request->email, $request->token);
    if ($otp->status==false) {
        dd('jjj'.$otp->status);
       return redirect()->back()->withErrors('token','token not correct');
    }
    return  redirect()->route('dashpoard.showresetform', ['email'=>$request->email] );
       }
       public function showresetform( $email){
          return view('dashboard.auth.password.restpassword',compact('email'));
       }
       public function resetpassword( Request $request){
          
          $request->validate([
             'email'=>['required'],
             'password'=>['required'],
             'password_confirmation'=>['required'],
     
         ]);
         $admin=Admin::where('email', $request->email)->first();
         if (!$admin) {
        return redirect()->back()->with('error','try agin');
    
         }
         $admin->update(['password'=>   Hash::make($request->password)  ]) ;
         return  redirect()->route('dashboard.login');
         
       }
}
