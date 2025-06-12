<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\produectrequest;
use App\Models\Attribute;
use App\Models\Broduct;
use App\Models\ProductVariant;
use App\Models\Produect_image;
use App\Models\VariantAttribute;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class produectcontroller extends Controller
{
   
    public function create (){
        return view('dashboard.produect.create');
    }
   public function delete_image($id){
  
$image=Produect_image::find($id);
$imagePath = public_path('uploads/produect/' . $image->file_name);
if (file_exists($imagePath)) {
    unlink($imagePath); // Delete the file
}

$image->delete();
return response()->json(['success' => true]);
   }
    
    public function edit($id){
        $valueRowCount=0;
        $variants=0;
        $variantAttributes=[];
$produect=Broduct::find($id);
$images=$produect->images;
$productAttributes=Attribute::with('attributrvalues')->get();
if ($produect->has_variants==1) {
    $valueRowCount=$produect->variants->count();
    $variants=$produect->variants;
    foreach ($variants as $key => $variant) {
        foreach ($variant->variantAttributes as $variantAttribute) {
            $variantAttributes[$key][$variantAttribute->attributeValue->attribute_id] = $variantAttribute->attribute_value_id;
        }
    }
    // dd( $variantAttributes);
    // dd($variantAttributes);

    # code...
}
return view('dashboard.produect.update',compact('valueRowCount','produect','variants','productAttributes','variantAttributes','images'));

       
    }

    public function show($id){
        $product=Broduct::with('variants.variantAttributes')-> find($id);
        return view('dashboard.produect.show',compact('product'));
    }
public function destroy($id){
    $produect=Broduct::find($id);
    return response()->json(['status'=>'success']);

}
    public function status(Request $request){
        $produect=Broduct::find($request->produect_id);
        $produect->update([
'status'=>        $produect->status==0?1:0
        ]);
        $produectupdate=Broduct::find($request->produect_id);
        return response( )->json(['status'=> $produectupdate->status(),'id'=>$produectupdate->id]);
    }
    public function index(){
        $produect=Broduct::all();
return view('dashboard.produect.index',compact('produect'));
    }
    public function update($id,Request $request){
        $product =Broduct::find($id);
        $productData = [
            'name' => ['ar' =>  $product->getTranslation('name' ,'ar')
            , 'en' => $product->getTranslation('name' ,'en')],
            'desc' => ['ar' =>  $product->getTranslation('desc' ,'ar'), 'en' => $product->getTranslation('desc' ,'en')],
            'small_desc' => ['ar' =>  $product->getTranslation('small_desc' ,'ar'), 'en' => $product->getTranslation('small_desc' ,'en')],
            'category_id' => $product->category_id,
            'brand_id' => $product->brand_id,
            'sku' => $product->sku,
            'available_for' => $product->available_for,
            'has_variants' => $product->has_variants,
            'price' => $product->has_variants == 1 ? null :$product->price,
            'manage_stock' => $product->has_variants == 1 ? 1 :  $product->manage_stock,
            'quantity' => $product->manage_stock == 0 ? null : $product->quantity,
            'has_discount' => $product->has_discount,
            'discount' => $product->has_discount == 0 ? null : $product->discount,
            'start_discount' => $product->has_discount == 0 ? null : $product->start_discount,
            'end_discount' => $product->has_discount == 0 ? null : $product->end_discount,
        ];
        $product= $product->update( $productData);
        if ( $product->has_variants) {
        $product_variants_delete=   $product->variants()->find($id);
        $product_variants_delete=    $product->delete();
            foreach ($request->  prices as $key => $value) {
                $ProductVariant=ProductVariant::create([
                    'product_id'=>$product->id,

                    'price'=>$request->prices[$key],
                    'stock'=>$request->quantities[$key]
                ]);
              foreach ($request->  attributeValues[$key] as  $attributeValue) {
                VariantAttribute::create([
             'product_variant_id'=>  $ProductVariant->id,
                   'attribute_value_id'=>$attributeValue
                ]);
              }
            }
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
    public function validtionstep3(Request $request){
        $validator = Validator::make($request->all(), [
            'image.*'=>['required','image','mimes:jpg,jpeg,png,gif'],
          
        ]);
   // dd($request->all());
        if ($validator->fails()) {
   
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
      //   Produect::create($request->all());
         return response()->json(['status' => true]);
    }
    public function submit(Request $request){

       
        $product = [
            'name' => ['ar' => $request->name['ar'], 'en' => $request->name['en']],
            'desc' => ['ar' => $request->desc['ar'], 'en' => $request->desc['en']],
            'small_desc' =>  ['ar' => $request->small_desc['ar'], 'en' => $request->small_desc['en']],
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'sku' => $request->sku,
            'available_for' => $request->available_for,
            'has_variants' => $request->has_variants,
            'price' => $request->has_variants == 1 ? null : $request->price,
            'manage_stock' => $request->has_variants == 1 ? 1 :  $request->manage_stock,
            'quantity' => $request->manage_stock == 0 ? null : $request->quantity,
            'has_discount' => $request->has_discount,
            'discount' => $request->has_discount == 0 ? null : $request->discount,
            'start_discount' => $request->has_discount == 0 ? null : $request->start_discount,
            'end_discount' => $request->has_discount == 0 ? null : $request->end_discount,
        ];
      $p=  Broduct::create( $product);


        if ($request->has_variants==1) {
            foreach ($request->  prices as $key => $value) {
                $p_v=ProductVariant::create([
                    'product_id'=>$p->id,

                    'price'=>$request->prices[$key],
                    'stock'=>$request->quantities[$key]
                ]);
              foreach ($request->  attributeValues[$key] as  $attributeValue) {
                VariantAttribute::create([
             'product_variant_id'=>  $p_v->id,
                   'attribute_value_id'=>$attributeValue
                ]);
              }
            }
         
        }
        if ($request->hasFile('image')) {


            foreach($request->file('image') as $image){

                $file_name = $this->generateImageName($image);
              
                $this->storeImageInLocal($image , '/' , $file_name , 'produect');

                $p->images()->create(['file_name'=>$file_name]);
            }
                




            
        }
        return response()->json(['status'=>true]);
    }

   public function store(Request $request){

      $validator = Validator::make($request->all(), [
         'name.*'=>['required','string','max:400','min:5'],
        'small_desc.*'=>['required','string'],
           'desc.*'=>['required','string','max:5000','min:5'],
           
         //  'status'=>['required','in 0,1'],
        
          'sku'           => ['required', 'string', 'max:30'],
          'category_id'   => ['required', 'exists:categories,id'],
          'brand_id'      => ['required', 'exists:brandes,id'],
          'available_for' => ['required', 'date'],
          'tags'         =>  ['required', 'string'],
     ]);
// dd($request->all());
     if ($validator->fails()) {

         return response()->json(['status' => false, 'errors' => $validator->errors()]);
     }
   //   Produect::create($request->all());
      return response()->json(['status' => true]);
   }



  
   // public function validtionstep1(Request $request){

     




   
     

     
   // }
   public function validtionstep2(Request $request){
      $data = [
         'has_variants'  => ['required', 'in:1,0'],
         'manage_stock'  => ['required', 'in:0,1'],
         'has_discount'  => ['required', 'in:1,0'],
     ];
     if ($request->has_variants == 0) {
      $data['price'] = ['required', 'numeric', 'min:1', 'max:1000000'];
  }
  if ($request->manage_stock == 1 && $request->has_variants == 0) {
      $data['quantity'] = ['required', 'min:1', 'max:1000000'];
  }
  if ($request->has_discount == 1) {
      $data['discount'] = ['required', 'numeric', 'min:1', 'max:100'];
      $data['start_discount'] = ['date', 'before:end_discount'];
      $data['end_discount']  = ['date', 'after:start_discount'];
  }
  if ($request->has_variants == 1) {
      $data['prices'] = 'required|array|min:1';
      $data['prices.*'] = 'required|numeric|min:1|max:1000000';
      $data['quantities'] = 'required|array|min:1';
      $data['quantities.*'] = 'required|integer|min:0';
      $data['attributeValues'] = 'required|array|min:1';
      $data['attributeValues.*'] = 'required|array';
      $data['attributeValues.*.*'] = 'required|integer|exists:attribute_values,id';
  }
      $validator = Validator::make($request->all(),   $data);

     if ($validator->fails()) {
         return response()->json(['status' => false, 'errors' => $validator->errors()]);
     }

     return response()->json(['status' => true]);
   }
}
