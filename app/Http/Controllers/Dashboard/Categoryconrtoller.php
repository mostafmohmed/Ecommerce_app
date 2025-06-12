<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Models\Category;
use App\services\Dashboard\categoryservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class Categoryconrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public  $categoryservices;
    public function __construct(categoryservices $categoryservices ) {
        $this->categoryservices = $categoryservices;
    }
    public function getall(){
        $category=Category::get();
        return DataTables::of( $category)->addColumn('name',function( $category){
            
            return $category->getTranslation('name',app()->getLocale());
            
          
        })->addColumn('logo',function( $category){
            $category=$category->logo;
            return view('dashboard.Category.image',compact('category'));
            
          
        })
        ->addColumn('created_at',function( $category){
            
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
        $categories=$this->categoryservices->getparentcategory();
        return view('dashboard.Category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryRequest $request)
    {
        $category=$this->categoryservices->create($request);
        if (!$category) {
            Session::flash('error' , __('dashboard.error_msg'));
            return redirect()->back();
            }
            Session::flash('success' , __('dashboard.success_msg'));
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
        $category=  $this->categoryservices->getCategoryByid($id);
        $categories=$this->categoryservices->getCategoriesExceptChildren( $id);
   return view('dashboard.Category.edite',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryRequest $request, string $id)
    {
      $category=  $this->categoryservices->update($request,$id);
      if (!$category) {
        Session::flash('error' , __('dashboard.error_msg'));
      return redirect()->back();
      }
      Session::flash('success' , __('dashboard.success_msg'));
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

     $category=Category::find($id);
  
     $path = public_path('uploads/category/' . $category->getRawOriginal('logo'));
// dd(  $path);
     if (File::exists( $path )) {

         File::delete( $path );
         // return 'fhfvhngvn';
         # code...;
       
     }
     $category->delete();
     Session::flash('success' , __('dashboard.success_msg'));
     return redirect()->back();
    }
}
