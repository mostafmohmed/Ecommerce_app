<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;

class RoleRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public  function getroleid ($id){
        return Role::find($id);
    }
    public function update($request ,$role){
        $role = $role->update([
            'role'=>$request->role,
            'permession'=>json_encode($request->permessions),
        ]);
        return $role;
    
    }
    public function create($request){
    $role=    Role::create([
        'role'=>[
            'ar'=>$request->role['ar'],
            'en'=>$request->role['en'],
        ],
            'permession'=> json_encode( $request->permessions),

        ]);
        return  $role;

    }
    public function destroy($role)
    {
        return $role->delete();
    }
    public function roles(){
        return Role::get();
    }
}
