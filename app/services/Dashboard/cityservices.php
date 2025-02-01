<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\countryRepositories;

class cityservices
{
    /**
     * Create a new class instance.
     */
 public   $countryRepositories;
    public function __construct( countryRepositories $countryRepositories)
    {
     $this->countryRepositories=$countryRepositories;
    }
    public function getcountryid($id){
        $country= $this->countryRepositories->getcountryById($id);
        if (!$country) {
            abort(404);
          
        }
        return $country;
      }
      public function getGovermentid($id){
        $Governreate=$this->countryRepositories->getGovernreateById($id);
        if (!$Governreate) {
            abort(404);
          
        }
        return $Governreate;
      }
      public function getallcountry(){
        return $this->countryRepositories->getAllCountries();
      }
      public function getallGoverment($cont_id){

        $country=$this->getcountryid($cont_id);
        return  $country->Governreats;

      }
      public function getallcities($gov_id){

        $Goverment=$this->getGovermentid($gov_id);

        return $Goverment->cities;
      }
      public function changestatsgoverment($gov_id){
$Goverment=$this->getGovermentid($gov_id);
$Goverments=   $this->countryRepositories->changeStatus($Goverment);
if (!$Goverments) {
   return false;
}
return true;
      }
      public function changestatscountryt($country_id){
        $country=$this->getcountryid($country_id);
        $Goverments=   $this->countryRepositories->changeStatus($country);
        if (!$Goverments) {
           return false;
        }
        return true;
              }

}
