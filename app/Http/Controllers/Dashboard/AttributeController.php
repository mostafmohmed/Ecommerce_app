<?php

namespace App\Http\Controllers\Dashboard;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\services\Dashboard\Attributeservices;
use App\services\Dashboard\Attributevalueservices;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public $attributeservice;
    public $attributevalueservices;
    public function __construct(Attributeservices $attributeservice,Attributevalueservices $attributevalueservices)
    {
       
        $this->attributeservice=$attributeservice;
        $this->attributevalueservices=$attributevalueservices;
    }
    public function update(Request $request, string $id){
    //   dd($request); 
      $attribute= Attribute::find($id);
      $attribute->update(['name'=>$request->name]);
      foreach($request->value as $k =>$v){
        $attributevalue=  $attribute->attributrvalues()->find($k);
      if ( $attributevalue) {
        $attributevalue->update(['value'=>$v]);
      }else{
        $attributee= Attribute::find($id);
       
      
        $attributee->attributrvalues()-> create(['value'=>$v]);
      }

     
      }
      return response()->json(['status'=>'sucess','message'=>'sucess']);
    //   $attribute->attributrvalues()->update([''])
    }
    public function index(){
        return view('dashboard.attributes.index');
    }
    public function store(Request $request){
       
       $attribute=  $this->attributeservice->create($request->all());

        // foreach ( $request->value as $value) {
           
        //     $attribute-> attributrvalues()->create(['value'=>$value]) ;
        // }
      
return response()->json(['sucess'=>'gfhfh']);
    }
public function getall(){
    $attribute=Attribute::with('attributrvalues')->get();
    return DataTables::of($attribute)

            ->addIndexColumn()
            ->addColumn('name', function ($item) {
                return $item->getTranslation('name', app()->getLocale());
            })
            ->addColumn('attributrvalues' , function($item){
                return view('dashboard.attributes.attributrvalues',compact('item'));
            })
            ->addColumn('action', function ($item) {
                return view('dashboard.attributes.actions',compact('item'));
            })

            ->make(true);
}
}
