<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rolerequest;
use App\services\Dashboard\Roleservices;
use Illuminate\Http\Request;

class Rolecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $roleservices;
    public function __construct(Roleservices $roleservices ) {
        $this->roleservices = $roleservices;
    }
    public function index()
    {
        $roles =$this->roleservices->roles();
        
        return view('dashboard.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('dashboard.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Rolerequest $request)
    {
        if (! $this->roleservices->create($request)) {
            return redirect()-> back()->with('error', __('dashboard.error_msg'));

        }
        return redirect()->back()->with('success' , __('dashboard.success_msg'));
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role=   $this->roleservices->getroleid($id);
        return view('dashboard.role.edite',compact('role'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $ur=   $this->roleservices->update($request,$id);
     if(!$ur){
        return redirect()-> back()->with('error', __('dashboard.error_msg'));

     }
     return redirect()->back()->with('success' , __('dashboard.success_msg'));
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $d=  $this->roleservices->destroy($id);
      if(!$d){
        return redirect()-> back()->with('error', __('dashboard.error_msg'));

     }
     return redirect()->back()->with('success' , __('dashboard.success_msg'));
    }
}
