<?php
namespace App\services\Auth;

use App\Repositories\Auth\AuthResitories;
use Illuminate\Support\Facades\Auth;


class Authservice{

 protected $authRepository;
    public function __construct(AuthResitories $authRepository) {
   $this->authRepository=$authRepository;
    }
    public function login($credenstials,$guard,$remmber=false){
return $this->authRepository->login($credenstials,$guard,$remmber);
    }
    public function lougout($guard){
return $this->authRepository->logout($guard);
    }

}