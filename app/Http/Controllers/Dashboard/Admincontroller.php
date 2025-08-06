<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adminrequest;
use App\Models\Role;
use App\Repositories\Dashboard\AdminRepositories;
use App\services\Dashboard\Adminservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Admincontroller extends Controller
{
    protected $adminservices;
    public function __construct(Adminservices $adminservices ) {
        $this->adminservices = $adminservices;
    }
    public function index()
    {
        // dd(auth('admin')->user()->id);
        $dmins =$this->adminservices->Admins();
        
        return view('dashboard.admin.index',compact('dmins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();
       return view('dashboard.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Adminrequest $request)
    {
        if (! $this->adminservices->create($request)) {
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
        $admin=   $this->adminservices->getAdminid($id);
        $roles=Role::all();
        return view('dashboard.admin.edite',compact('admin','roles'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $ur=   $this->adminservices->update($request,$id);
     if(!$ur){
        return redirect()-> back()->with('error', __('dashboard.error_msg'));

     }
     return redirect()->back()->with('success' , __('dashboard.success_msg'));
     
    }

    /**
     * Remove the specified resource from storage.
     */
   
    public function changeStatus($id)
    {
        if(!$this->adminservices->changeStatus($id)){
            Session::flash('erorr' , __('dashboard.error_msg'));
            return redirect()->back();
        }
        Session::flash('success' , __('dashboard.success_msg'));
        return redirect()->route('dashboard.admins.index');
    }

    public function destroy(string $id)
    {
      $d=  $this->adminservices->destroy($id);
      if(!$d){
        return  response()->json(['status'=>false]);

     }
     return  response()->json(['status'=>true]);
    }
}
