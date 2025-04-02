<?php

namespace App\Repositories\Dashboard;

use App\Models\Attribute;

class AttributeRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function create($request){
       $attribute= Attribute::create(['name'=>$request['name']]);
       return  $attribute;
    }
}
