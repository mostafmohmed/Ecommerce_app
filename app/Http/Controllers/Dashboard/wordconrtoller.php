<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Governreate;
use App\Models\ShappingGovernrate;
use App\services\Dashboard\cityservices;
use Illuminate\Http\Request;

class wordconrtoller extends Controller
{

    public $cityservices;
    public function __construct(cityservices $cityservices ) {
        $this->cityservices = $cityservices;
    }
    public function changeshipping( Request$request){
      $gov=ShappingGovernrate::find($request->gov_id);
      $gov->price=$request->price;
      $gov->save();
     
      return response()->json([
        'message'=>__('dashboard.success_msg'),
        'data'=>$gov,
        'status'=>'success'
      ]);
   
    }
    public function getAllCountries(){
       $countries= $this->cityservices->getallcountry();
       return view('dashboard.word.word',compact('countries'));

    }
    public function changesstatuscountry($id){
      $country=  $this->cityservices->changestatscountryt($id)  ;
      if (!$country) {
        return response()->json(['status'=>false, 'message'=>__('dashboard.error_msg')]);
      }
      return response()->json([
        'status'=>true,
        'data'=>$this->cityservices->getcountryid($id),
        'message'=>__('dashboard.success_msg')
      ]);
    }
public function changesstatusgoverment($id){
  $gov=  $this->cityservices->changestatsgoverment($id)  ;
  if (!$gov) {
    return response()->json(['status'=>false, 'message'=>__('dashboard.error_msg')]);
  }
  return response()->json([
    'status'=>true,
    'data'=>$this->cityservices->getGovermentid($id),
    'message'=>__('dashboard.success_msg')
  ]);
}


public function getGovsByCountry($country_id){
  $Govs= $this->cityservices->getallGoverment($country_id);
  if (!$Govs) {
    abort(404);
  }
  return view('dashboard.word.Goverment',compact('Govs'));

}

    // ')->name('governorates.index
  
}
