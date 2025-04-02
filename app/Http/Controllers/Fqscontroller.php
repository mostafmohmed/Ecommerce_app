<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fqrequest;
use App\Models\Faqs;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class Fqscontroller extends Controller
{
    public function destroy(string $id)
    {
        $Faqs=Faqs::find($id);
        $Faqs->delete();
        return response()->json(['status'=>true,'message'=>'sucess process','date'=> $Faqs,'message'=>'sucess process']);
    }
   public function index(){
    $Faqs=Faqs::get();
    return view('dashboard.Fqs.index',compact('Faqs'));
   }
   public function store(Fqrequest $request){
    // $request=$request->Validated();
    $Faqs=Faqs::create($request->all());
    return response()->json(['status'=>true,'fags'=> $Faqs,'message'=>'sucess process']);
   }
   public function edit(string $id)
   {
    $Faqs=Faqs::find($id);
    return response()->json(['status'=>true,'fqs'=>$Faqs]);
   }
   public function update(Fqrequest $request, string $id)
   {
    $Faqs=Faqs::find($id);
    $Faqs->update( $request->all());
$f=   Faqs::find($id);
    return response()->json(['status'=>true,'massage'=>'sucess process','date'=>$f]);
    
   }
}
