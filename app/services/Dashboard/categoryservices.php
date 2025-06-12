<?php

namespace App\services\Dashboard;
use Illuminate\Support\Facades\File;
use App\Repositories\Dashboard\CategoryRepositories;
use Illuminate\Support\Str;
class categoryservices
{
    /**
     * Create a new class instance.
     */

    public $categoryrepositories;
    public function __construct( CategoryRepositories $categoryrepositories)
    {
      $this->categoryrepositories=$categoryrepositories;
    }
    public function generateImageName($image)
    {
        $file_name = Str::uuid() . time() . $image->getClientOriginalExtension();
        return $file_name;
    }
    private function storeImageInLocal($image , $path , $file_name , $disk)
    {
         $image->storeAs($path , $file_name , ['disk'=>$disk]);
    }
    public function get(){
        return  $this->categoryrepositories->getall();
    }
    public function  getCategoryByid($id){
       
        return $this->categoryrepositories->findBYId($id);
       
    }
    public function create($request){
       $category= $this->categoryrepositories->create($request) ;
       if ($request->file('logo')) {
        $file_name=$this->generateImageName($request->logo);
      
        $this->storeImageInLocal($request->logo,'', $file_name,'category');
        // dd($file_name);
      $category=$category->update(['logo'=>$file_name]);
       }
       return   $category;

    }
    public function getCategoriesExceptChildren($id){
        return $this->categoryrepositories->getCategoriesExceptChildren($id);
    }
    // public function update($category,$reguest){
    //     $categorya=  $category->update($reguest) ;
    //     return   $categorya;
    // }
    public function update($reguest,$id){
        if ($reguest->file('logo')) {
            $category_logo = $this->getCategoryByid($id);
            $path =  public_path('uploads/category/'.$category_logo->getRawOriginal('logo')); 
// dd( $path);
            if (File::exists( $path )) {
     
                File::delete( $path );
               
                # code...;
            }
            $file_name=$this->generateImageName($reguest->logo);
            $this->storeImageInLocal($reguest->logo,'', $file_name,'category');
            $this->categoryrepositories->update($this->getCategoryByid($id),$reguest,  $file_name);
        }
        $category=$this->categoryrepositories->update($this->getCategoryByid($id),$reguest->except('logo'));
        if (!$category) {
           return false;
        }
        return true;
    }
    
public function getparentcategory(){
    return $this->categoryrepositories->getparentcategory();
}
}
