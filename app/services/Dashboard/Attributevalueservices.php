<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\AttributevalueRepositories;

class Attributevalueservices
{
    /**
     * Create a new class instance.
     */public $AttributevalueRepositories;
    public function __construct(AttributevalueRepositories $AttributevalueRepositories)
    {
       $this->AttributevalueRepositories=$AttributevalueRepositories;
    }
    public function create($requestvalue,$attribute){
foreach ($requestvalue as  $value) {
 $attribute=   $this->AttributevalueRepositories->create($attribute,$value);
}
return  $attribute;
    }
}
