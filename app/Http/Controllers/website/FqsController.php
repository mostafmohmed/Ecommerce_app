<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\questionrequest;
use App\Mail\answer;
use App\Models\Admin;
use App\Models\Question;
use App\Notifications\SendQuestionNotification;
use App\services\front\fqsserveices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class FqsController extends Controller
{
    public $fqsserveices;
  public function __construct(fqsserveices $fqsserveices ) {
    $this->fqsserveices = $fqsserveices;
  }
  public function getfqs(){
  $fqs=  $this->fqsserveices->fqs();
  return view('website.fqs',compact('fqs'));
  }
  public function sendquestions(questionrequest $request){
        $validated = $request->validated();

    Question::create($validated);
       ini_set('max_execution_time', 120); 
    $admins=Admin::get();
     foreach (    $admins as  $admin) {
               $admin->notify(new SendQuestionNotification($validated));
     }

    
    return back()->with('success', 'Your message has been sent.');

}
public function index(){
   return view('dashboard.question.index'); 
}
public function getall(){
            $questions=Question::get();
         return DataTables::of( $questions)
        ->addIndexColumn()
      
        
        ->addColumn('actions',function($question ){
            return view('dashboard.question.actions',compact('question')) ;
        })
         ->make(true)
        ;
}
public function sendawnser(Request $request){
      $question=Question::find($request->id);
    Mail::to( $question->email)->send(new answer($request->message));
    return response()->json([ 'status'=>true]);
}

}
