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
    

}
