<?php

namespace App\Repositories\Dashboard;

use App\Models\Slider;

class SliderRepository
{
    /**
     * Create a new class instance.
     */
   
     public function getsliders(){
        return Slider::latest()->get();
     }
     public function create($data,$file_name){
      // dd($data);
return Slider::create([
   'notes'=>[
      'ar'=> $data['notes_ar'],
      'en'=> $data['notes_en'],
  ],
   'file_name'=> $file_name,
]
   
);
     }
     public function getslider($id){
        return Slider::find($id);

     }
     public function delete($model){

return $model->delete();
     }
     public function update($model,$data){
        return $model->update($data);
     }
}
