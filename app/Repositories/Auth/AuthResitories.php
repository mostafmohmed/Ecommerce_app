<?php
namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class AuthResitories{
    public function login($email,$password,$remmber){
return Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password],$remmber);
    }

}