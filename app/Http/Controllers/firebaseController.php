<?php

namespace App\Http\Controllers;

use App\FirebaseService;
use Illuminate\Http\Request;

class firebaseController extends Controller
{

    public $firebase;
    public function __construct(FirebaseService $firebase) {
        $this->firebase = $firebase;
    }
    public function index(){
       return   $this->firebase->getData('data');
    }

}
