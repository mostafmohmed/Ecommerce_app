<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\couponrequest;
use App\Models\Coupons;
use App\Repositories\Dashboard\couponsRepositories;
use App\services\Dashboard\couponsservices;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Couponsconrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $couponsRepositories;
    public function __construct(couponsservices $couponsRepositories ) {
        $this->couponsRepositories = $couponsRepositories;
    }
    public function index()
    {
  
   return view('dashboard.copons.index');
    }
    public function getall(){
        $coupns=Coupons::get();
         return DataTables::of( $coupns)
        ->addIndexColumn()
      
        ->addColumn('is_active',function($row){
            return $row->is_active ;
        })
       
        ->addColumn('discount_perecentage',function($row){
            return $row->discount_perecentage;
        }) 
       
        
        ->addColumn('actions',function($coupn ){
            return view('dashboard.copons.actions',compact('coupn')) ;
        })
         ->make(true)
        ;
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
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'code'=>'required|min:4|max:10',
            'discount_perecentage'=>'required|numeric|between:1,100',
            'start_data'=>'required|after_or_equal:now',
            'end_data'=>'required|after:start_data',
            'limit'=>'required|numeric|min:1',
            'is_active'=>'boolean',
        ]
        );
        if ( $validator->passes()) {
            $this->couponsRepositories->create($request->all());
            return   response()->json(['status'=>true,'message'=>'sub_category update sucess']);
        }else{
          return response()->json(['status'=>false,'errors'=>$validator->errors()]);
        }
      
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {



        $validator=Validator::make($request->all(),[
            'code'=>'required|min:4|max:10',
            'discount_perecentage'=>'required|numeric|between:1,100',
            'start_data'=>'required|after_or_equal:now',
            'end_data'=>'required|after:start_data',
            'limit'=>'required|numeric|min:1',
            'is_active'=>'boolean',
           
        ]
        );
        if ( $validator->passes()) {
            // $copoun=Coupons::find($id);
            // $copoun->update( $request->all());
            $this->couponsRepositories->updatecoupon($id,$request) ;
            return response()->json(['status'=>true,'massage'=>'sucess']);
        }else{
          return response()->json(['status'=>false,'errors'=>$validator->errors()]);
        }









    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // $copoun=Coupons::find($id);
        // $copoun->delete();

        if (! $this->couponsRepositories->deletecoupon($id)) {
            return response()->json(['message'=>'fail process','status'=>false]);
        }
        return response()->json(['message'=>'sucess process','status'=>true]);
        
    }
}
