<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\AttributeRepositories;
use App\Repositories\Dashboard\AttributevalueRepositories;

class Attributeservices
{
    /**
     * Create a new class instance.
     */
    public $AttributevalueRepositories;
    public $attributeRepositories;
    public function __construct(AttributeRepositories $attributeRepositories,AttributevalueRepositories $AttributevalueRepositories)
    {
       
        $this->attributeRepositories=$attributeRepositories;
        $this->AttributevalueRepositories=$AttributevalueRepositories;
    }
    public function create($request){
        $attribute=$this->attributeRepositories->create($request);
        foreach ($request['value'] as  $value) {
            $this->AttributevalueRepositories->create($attribute,$value);
           }
        return  $attribute;
     }
}
