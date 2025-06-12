<?php

namespace App\services\Dashboard;
use Illuminate\Support\Str;
use App\Repositories\Dashboard\SliderRepository;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class Sliderservices
{
    /**
     * Create a new class instance.
     */
    public $SliderRepository;
    public function __construct(SliderRepository $SliderRepository)
    {
      $this->SliderRepository=$SliderRepository;
    }
    public function deleteImageFromLocal($image_path):void
    {
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }

    }
    public function generateImageName($image)
    {
        $file_name = Str::uuid() . time() . $image->getClientOriginalExtension();
        return $file_name;
    }
    private function storeImageInLocal($image , $path , $file_name , $disk)
    {
         $image->storeAs($path , $file_name , ['disk'=>$disk]);
    }
    public function create($data){
        // if ($data->file_name) {
            $file_name = $this->generateImageName($data->file_name);
              
                $this->storeImageInLocal($data->file_name , '/' , $file_name , 'slider');

        // }
         $data=$data->all();
        //  dd( $data);
        // return $data;
return $this->SliderRepository->create($data,$file_name);
    }
    public function getsliders(){
        return $this->SliderRepository->getsliders();
    }
    public function getslider($id){
        return $this->SliderRepository->getslider($id);
    }
    public function delete($id){
      $slider=  $this->getslider($id);
      $this->deleteImageFromLocal($slider->file_name);
        return $this->SliderRepository->delete($this->getslider($id));
}
public  function getsliderformatdata(){
$sliders=$this->getsliders();
return DataTables::of($sliders)->addIndexColumn()->addColumn('notes',function($slider){
    return $slider->getTranslation('notes', app()->getLocale());
})->addColumn('file_name',function($slider){return view('dashboard.slider.image',compact('slider'));})
->addColumn('actions',function($slider){return view('dashboard.slider.action',compact('slider'));})
->make(true);
}
}
