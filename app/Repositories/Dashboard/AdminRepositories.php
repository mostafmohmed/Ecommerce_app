<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;

class AdminRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }
    public  function getAdminid ($id){
        return Admin::find($id);
    }
    public function update($request ,$Admin){
        $Admin = $Admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'Admin_id'=>$request->Admin_id,
        ]);
        return $Admin;
    
    }
    public function changeStatus($admin , $status)
    {
        $admin = $admin->update([
            'status'=>$status,
        ]);

        return $admin;
    }
    public function create($request){
    $admin=    Admin::create([
        'name'=>[
            'ar'=>$request->Admin['ar'],
            'en'=>$request->Admin['en'],
        ],
        'email'=>$request->email,
        'password'=>$request->password,
        'role_id'=>$request->Admin_id,

        ]);
        return  $admin;

    }
    
   
    public function destroy($Admin)
    {
        return $Admin->delete();
    }
    public function Admins(){
        return Admin::get();
    }
   
}
