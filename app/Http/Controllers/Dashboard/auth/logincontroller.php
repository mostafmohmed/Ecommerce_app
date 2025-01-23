<?php

namespace App\Http\Controllers\Dashboard\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\dash\loginrequst;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller implements  HasMiddleware

{
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
    
    if () {
       return   redirect()->intended(route('dashpoard.index'))    ;
    }else{
        return redirect()->back()->withErrors('email',__('auth.not_match'));
    }
  }
  public function logout(){
    Auth::guard('admin')->logout();
    return redirect()->route('dashpoard.login');
  }
}
