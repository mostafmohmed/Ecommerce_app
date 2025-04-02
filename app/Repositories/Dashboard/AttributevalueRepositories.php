<?php

namespace App\Repositories\Dashboard;

class AttributevalueRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function create($attribute,$value){
        $attribute-> attributrvalues()->create(['value'=>$value]) ;
    }
}
