<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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


        $data = [
    'name' => $request->name,
    'email' => $request->email,
    'role_id' => $request->role_id,
    'status' => $request->status,
];

// لو الباسورد مش فاضية، ضيفها للبيانات بعد ما نعملها هاش
if ($request->filled('password')) {
    $data['password'] = Hash::make($request->password);
}
        $Admin = $Admin->update(  $data);
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
        'name'=>$request->name,
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
