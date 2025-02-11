<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\CategoryRepositories;

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
    public function get(){
        return  $this->categoryrepositories->getall();
    }
    public function  getCategoryByid($id){
       
        return $this->categoryrepositories->findBYId($id);
       
    }
    public function create($request){
       $category= $this->categoryrepositories->create($request) ;
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
        $category=$this->categoryrepositories->update($this->getCategoryByid($id),$reguest);
        if (!$category) {
           return false;
        }
        return true;
    }
    
public function getparentcategory(){
    return $this->categoryrepositories->getparentcategory();
}
}
