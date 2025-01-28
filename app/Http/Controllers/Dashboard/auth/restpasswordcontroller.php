<?php

namespace App\Http\Controllers\Dashboard\auth;
use Ichtrojan\Otp\Otp;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\sendotp;
use App\services\Auth\Passwordservise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class restpasswordcontroller extends Controller
{
   protected $Passwordservise;
   public function __construct(Passwordservise $Passwordservise) {
      $this->Passwordservise = $Passwordservise;
   }
    public function showemailform(){
        return view('dashboard.auth.password.email');
       }
       public function sendotp(Request $request){
         $request->validate(['email'=>['required','email']]);
    $admin=     $this->Passwordservise->sendotp( $request->email);
       
      //   $email=Admin::where('email',$request->email)->first();
        if (!  $admin) {
           return redirect()->back()->withErrors(['email'=> __('passwords.email_is_not_regiterd')]);
        }
      
    return redirect()->route('dashpoard.showotpform', ['email'=> $admin->email]);
       }
       public function showotpform($email){
    
    return view('dashboard.auth.password.showotp',compact('email'));
       }
       public function verfiyotp(Request $request){
        $request->validate([
            'email'=>['required'],
            'token'=>['required'],
    
        ]);
      
      // $otp= (new Otp)->validate($request->email, $request->token);
      $data=['email'=> $request->email, 'code'=> $request->token];
    if   (!$this->Passwordservise->verifyOtp( $data)) {
      
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
         // $admin=Admin::where('email', $request->email)->first();
         if ($this->Passwordservise->resetPassword( $request->email,  $request->password)) {
        return   redirect()->route('dashpoard.login'); 
    
         }
         // $admin->update(['password'=>   Hash::make($request->password)  ]) ;
         return    redirect()->back()->with(['error' => 'Try Again Latter!']);
         
       }
}
