<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexcontroller extends Controller
{
    public function index(){
        //  dd(auth('admin')->user()->id);
        return view('dashboard.welcome');
    }
}
