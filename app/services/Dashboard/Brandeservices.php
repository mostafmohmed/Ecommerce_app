<?php

namespace App\services\Dashboard;

use App\MangeInage;
use App\Repositories\Dashboard\BrendeRepositories;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class Brandeservices
{
    /**
     * Create a new class instance.
     */
 public   $brendeRepositories ,$mangeInage;
    public function __construct(BrendeRepositories $brendeRepositories ,MangeInage $mangeInage)
    {
      $this->brendeRepositories=$brendeRepositories;
      $this->mangeInage=$mangeInage;
    }
    
    public function update($request,$id){
     $brande  = $this->getBrandeBYId($id);
        if ($request->logo !=NULL) {
            $this->mangeInage->deleteImageFromLocal('uploads/brands/'.$request->logo);
            $file_name=     $this->mangeInage->uploadSingleImage('/', $request->logo,'brand');
         
    $request=  $request->all()  ;
    $request['logo']= $file_name;
    
        }
        return    $this->brendeRepositories->update(  $brande,$request); 
       
    }
    public function create($request){
        if(array_key_exists('logo',$request)  and  $request['logo'] !=NULL){
         $file_name=     $this->mangeInage->uploadSingleImage('/', $request['logo'],'brand');
            $request['logo']= $file_name;
        }
        Cache::forget('category_count');
        return    $this->brendeRepositories->create($request);

    }
    public function getBrandeBYId($id){
return   $this->brendeRepositories->getBrandeBYId($id);
    }
    public function getBrandsForDatatables(){
        $brandes=$this->brendeRepositories->getBrandeall();
        return DataTables::of( $brandes)->addIndexColumn()
        ->addColumn('logo',function( $brand){
            
            return view('dashboard.brande.logo',compact('brand'));
            
          
        })
        ->addColumn('products_Count',function( $brand){
            
            return $brand->products_count==0? __('dashboard.not_found'): $brand->products_count;
            
          
        })
        ->addColumn('name',function( $brand){
            
            return $brand->getTranslation('name',app()->getLocale());
            
          
        })->addColumn('created_at',function( $brand){
            
            return $brand->created_at->format('Y-m-d');
            
          
        })->addColumn('status',function( $brand){
            if (app()->getLocale()=='en') {
                return $brand->status==1?'Active':'InActive';
            }else{
                return $brand->status==1?'مفعل':'غير مفعل';
            }
           

            
       
            
          
        })->addColumn('actions',function( $brand){
            
            return view('dashboard.brande.actions',compact('brand'));
            
          
        })
        ->rawColumns(['actions', 'logo'])
        
        
        ->make(true);
    }
}
