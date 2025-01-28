<?php
namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class AuthResitories{
    public function login($credenstials,$guard,$remmber=false){
return Auth::guard($guard)->attempt($credenstials,$remmber);
    }
    public function logout($gaurd){
      return  Auth::guard($gaurd)->logout();

    }

}