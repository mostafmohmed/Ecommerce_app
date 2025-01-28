<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\RoleRepositories;

class Roleservices
{
    /**
     * Create a new class instance.
     */
    protected $roleRepositories;
    public function __construct(RoleRepositories $roleRepositories)
    {
        $this-> roleRepositories=$roleRepositories;
    }
   

    public  function getroleid ($id){
        return $this-> roleRepositories->getroleid($id);
    }


    public function roles(){
        return $this-> roleRepositories->roles()  ;
    }

    public function destroy($id)
    {
        $role= $this-> roleRepositories->getroleid($id);
        if(  $role->admins->count()>0 || !$role ){
            return false;
        }
        return$this-> roleRepositories->destroy($role);
    }

    public function update($request ,$id){
     $roleid=   $this->getroleid($id);
     if(! $roleid){
        return false;
       
     }
   return  $this-> roleRepositories->update($request,$roleid);
    }




    public function create($request){
      $role=  $this-> roleRepositories->create($request);
       if(!$role)  {
        return false;
       }else{
        return $role;
       }
     
    }
}
