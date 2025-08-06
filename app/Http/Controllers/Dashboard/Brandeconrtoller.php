<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\branderequest;
use App\Models\Brande;
use App\services\Dashboard\Brandeservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class Brandeconrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $brandeservices;
    public function __construct(Brandeservices $brandeservices ) {
        $this->brandeservices = $brandeservices;
    }
    public function index()
    {
        return view('dashboard.brande.index');
    }
    public function getall(){
        return   $this->brandeservices->getBrandsForDatatables();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(branderequest $request)
    {
         $request=$request->all();
   $brand=     $this->brandeservices->create($request);
   if(! $brand){
    Session::flash('error' , trans('dashboard.error_msg'));
            return redirect()->back();   
}
Session::flash('success' , trans('dashboard.success_msg'));
return redirect()->back();

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
      $brande=  $this->brandeservices->getBrandeBYId($id);
   return view('dashboard.brande.edite',compact('brande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(branderequest $request, string $id)

    {
        $brand=     $this->brandeservices->update($request,$id);
if (! $brand) {
    Session::flash('error' , trans('dashboard.error_msg'));
    return redirect()->back();  
}
Session::flash('success' , trans('dashboard.success_msg'));
return redirect()->back();

     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
