<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\AdminRepositories;

class Adminservices
{
    /**
     * Create a new class instance.
     */
   
    protected $adminRepositories;
    public function __construct(AdminRepositories $adminRepositories)
    {
        $this-> adminRepositories=$adminRepositories;
    }
    public function changeStatus($id)
    {
        $admin = $this->adminRepositories->getAdminid($id);
        if(!$admin){
            abort(404);
        }
        $admin->status == 'Active'? $status = 0 : $status = 1;
        $status = $this->adminRepositories->changeStatus($admin, $status);
        return $status;

    }


    

    public  function getAdminid ($id){
        
        $Admin= $this-> adminRepositories->getAdminid($id);
        if (!$Admin) {
          return false;
        }
        return  $Admin;
    }


    public function Admins(){
        return $this-> adminRepositories->Admins()  ;
    }

    public function destroy($id)
    {
        $Admin= $this-> adminRepositories->getAdminid($id);
        if(   !$Admin ){
            return abort(404);
        }
        return $Admin;
    }

    public function update($request ,$id){
     $Admin=   $this->getAdminid($id);
     if(! $Admin){
        return abort(404);
       
     }
     if ($request==Null) {
        unset($request->password);
     }
   return  $this-> adminRepositories->update($request,$Admin);
    }

  





    public function create($request){
      $Admin=  $this-> adminRepositories->create($request);
       if(!$Admin)  {
        return false;
       }else{
        return $Admin;
       }
     
    }



}
