<?php

namespace App\services\front;

use App\Models\Faqs;

class fqsserveices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function fqs(){
        $fqs=Faqs::get();
        return  $fqs;
        
    }
}
