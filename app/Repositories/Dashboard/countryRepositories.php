<?php

namespace App\Repositories\Dashboard;

use App\Models\Country;
use App\Models\Governreate;

class countryRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getGovernreateById($id){
$Governreate=Governreate::find($id);
return $Governreate;
    }
    public function getcountryById($id){
        
        $country=Country::find($id);
    return   $country;
    }
    public function getAllCountries(){
        $countries = Country::when(!empty(request()->keyword),function($query){
            $query->where('name','like','%' .request()->keyword. '%');
        })->paginate(5);
        return  $countries;
    }
    public function getallcites($governorate){
        $city=$governorate->cities;
        return  $city;

    }



    public function getallGovernreat($city){
        $Governreat=$city->Governreats;
        return  $Governreat;

    }

    public function changeStatus($model)
    {
        $model = $model->update([
            'status' => $model->status == 'Active' || $model->status == 'مفعل' ? 0 : 1,
        ]);

        return $model;
    }


}
