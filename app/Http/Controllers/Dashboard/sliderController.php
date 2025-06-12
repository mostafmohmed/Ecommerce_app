<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\services\Dashboard\Sliderservices;

class sliderController extends Controller
{
    public $sliderservices;
  public function __construct( Sliderservices $sliderservices) {
    $this->sliderservices = $sliderservices;
  }
  public function destroy($id){
    $delete=$this->sliderservices->delete($id);
    if ( $delete) {
      return response()->json(['massage'=>'sucess delete','status'=>true]);
    }
    return response()->json(['massage'=>'fail delete','status'=>false]);

  }

  public function store(Request $request){
   
    return $this->sliderservices->create( $request);
  }
  public function slidersall(){
    return view('dashboard.slider.index');
  }
  public function slider(){
    return $this->sliderservices->getsliderformatdata();
  }
  

}
