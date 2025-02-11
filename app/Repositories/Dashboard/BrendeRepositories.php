<?php

namespace App\Repositories\Dashboard;

use App\Models\Brande;
use Yajra\DataTables\Facades\DataTables;

class BrendeRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function update($model,$request){
        
     $brande=   $model->update($request);
return  $brande;
    }
    public function getBrandeBYId($id){
$brande=Brande::find($id);
return $brande;
    }
    public function getBrandeall(){
       return Brande::withCount('products')->latest()->get();
       
    }
    public function create($reqest){
        // Brande::create($reqest->only(['name','status']));
        // if ($reqest->logo !=Null) {
        //     Brande::create(['name'=>$reqest->name,])
        // }
        return Brande::create($reqest);

    }
}
