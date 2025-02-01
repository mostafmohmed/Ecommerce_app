<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class Categoryconrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getall(){
        $category=Category::get();
        return DataTables::of( $category)->addColumn('name',function( $category){
            
            return $category->getTranslation('name',app()->getLocale());
            
          
        })->addColumn('created_at',function( $category){
            
            return $category->created_at->format('Y-m-d');
            
          
        })->addColumn('status',function( $category){
            if (app()->getLocale()=='en') {
                return $category->status==1?'Active':'InActive';
            }else{
                return $category->status==1?'مفعل':'غير مفعل';
            }
           

            
       
            
          
        })->addColumn('actions',function( $category){
            
            return view('dashboard.Category.actions',compact('category'));
            
          
        })
        
        
        ->make(true);
    }
    public function index()
    {
        return view('dashboard.Category.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $category=Category::find($id);
     $category->delete();
     Session::flash('success' , __('dashboard.success_msg'));
     return redirect()->back();
    }
}
