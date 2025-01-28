<?php

namespace App\Http\Controllers\Dashboard\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\dash\loginrequst;
use App\services\Auth\Authservice;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller implements  HasMiddleware

{
  protected $Authservice;
  public function __construct(Authservice $Authservice) {
    $this->Authservice = $Authservice;
  }
    static function middleware(): array
    {
        return [
            new Middleware(middleware: 'guest:admin', except: ['logout']),
        ];
    }
  public function showlogin(){
    return view('dashboard.auth.login');
  }

  public function login(loginrequst $request){
    $credenstials = $request->only(['email' , 'password']);


    if ( $this->Authservice->login($credenstials,'admin')) {
       return   redirect()->intended(route('dashpoard.index'))    ;
    }else{
        return redirect()->back()->withErrors('email',__('auth.not_match'));
    }
  }
  public function logout(){
      $this-> Authservice->lougout('admin');
    return redirect()->route('dashpoard.login');
  }
}
