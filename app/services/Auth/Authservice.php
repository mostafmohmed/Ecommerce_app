<?php
namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;


class Authservice{
    public function login($email,$password,$remmber){
$authRepositories=New AuthResitories();
 return $authRepositories->login($email,$password,$remmber);
    }

}