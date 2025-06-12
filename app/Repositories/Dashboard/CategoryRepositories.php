<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;

class CategoryRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    
    public function getall(){
        $category=Category::latest()->get();
        return $category;
    }
    public function findBYId($id){
        $category=Category::find($id);
        return   $category;
    }
    public function create($reguest){
        $category=Category::create($reguest->all()); 

return  $category;
    }
    public function update($category,$reguest,$file_name=null){
        if ($file_name !=null) {
            $categorya=  $category->update([
                'logo'=>$file_name
            ]) ;
        }else{
            $categorya=  $category->update($reguest) ;
            return   $categorya;
        }
   
    }
    public function delete($category){
        $category=  $category->delete() ;
        return   $category;
    }
    public function getparentcategory(){
        $category=Category::whereNull('parent')->get();
        return  $category;
    }
    public function getCategoriesExceptChildren($id)
    {
        $categories = Category::where('id', '!=', $id)
        ->whereNull('parent')
        ->get();
        return  $categories;
    }
}
