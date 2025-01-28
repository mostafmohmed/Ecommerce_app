<?php
namespace App\services\Auth;

use App\Notifications\sendotp;
use App\Repositories\Auth\PasswordRepository;

class Passwordservise{
    protected $PasswordRepository;
public function __construct(PasswordRepository $PasswordRepository ) {
    $this->PasswordRepository = $PasswordRepository;
}
public function sendotp($email){
     $adminemail= $this->PasswordRepository->getAdminByEmail($email);
     if(! $adminemail){
        return false;
     }
     $adminemail->notify(new sendotp());
     return $adminemail;
}
public function verifyOtp($data)
{
    $otp = $this->PasswordRepository->verifyOtp($data);
    return $otp->status;
}
public function resetPassword($email , $password)
{
    return $this->PasswordRepository->resetPassword($email , $password);
}


}