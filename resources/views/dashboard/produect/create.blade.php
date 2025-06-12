

@section('content')
@extends('healper.dash.parical')
@section('cs')
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
<link href="https://unpkg.com/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" /> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div id="smartwizard">
    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="#step-1">
            <div class="num">1</div>
            Step Title
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#step-2">
            <span class="num">2</span>
            Step Title
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#step-3">
            <span class="num">3</span>
            Step Title
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#step-4">
              <span class="num">3</span>
              Step Title
            </a>
          </li>
      
    </ul>
    <form id="step-1-form"   >
        @csrf
    <div class="tab-content">
       
        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
          
            <div class="row">
                <div class="col-md-4 mr-4">
                    <div class="form-group">
                        <label for="firstName2"> {{ __('dashboard.product_name_en') }} :</label>
                        <input  type="text" class="form-control"  name="name[ar]" id="name_ar"
                            placeholder="{{ __('dashboard.product_name_en') }}">
                            <p></p>
                            
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName2"> {{ __('dashboard.product_name_en') }} :</label>
                        <input  type="text" class="form-control" name="name[en]" id="name_en"
                            placeholder="{{ __('dashboard.product_name_en') }}">
                            <p></p>
                           
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress3"> {{ __('dashboard.small_description_ar') }}
                            :</label>
                        <textarea name="small_desc[ar]" class="form-control" id="small_desc_ar"></textarea>
                       <p></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailAddress3"> {{ __('dashboard.small_description_en') }}
                            :</label>
                        <textarea name="small_desc[en]" class="form-control" id="small_desc_en"></textarea>
                     <P></P>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location2"> {{ __('dashboard.description_ar') }} :</label>
                        <textarea name="desc[ar]" class="form-control" id="desc_ar"></textarea>
                      <p></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location2"> {{ __('dashboard.description_en') }} :</label>
                        <textarea name="desc[en]" class="form-control" id="desc_en"></textarea>
                      <p></p>
                    </div>
                </div>
            </div>
            @php
                $categories=App\Models\Category::get();
                $brands=App\Models\Brande::get();
                $Attribute=App\Models\Attribute::with('attributrvalues')->get();
            @endphp
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category"> {{ __('dashboard.category') }} :</label>
                        <select name="category_id" class="form-control custom-select" id="category_id">
                            <option value=""> {{ __('dashboard.select_category') }} </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                       <p></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand"> {{ __('dashboard.brand') }} :</label>
                        <select name="brand_id" class="form-control custom-select" id="brand_id">
                            <option value=""> {{ __('dashboard.select_brand') }} </option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                       <p></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName2"> {{ __('dashboard.product_sku') }} :</label>
                        <input name="sku" type="text" class="form-control" id="sku">
                       <p></p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date"> {{ __('dashboard.available_for') }} :</label>
                        <input name="available_for" type="date" class="form-control" id="available_for">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date"> {{ __('dashboard.product_tags') }} :</label>
                        <input type="text" name="tags" id="tags" class="form-control"
                            placeholder="Add tags">
                       <p></p>
                    </div>

                </div>

            </div>


        {{-- </form> --}}
        </div>


              
            
       
        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
            {{-- <form id="step-2-form" >
                @csrf --}}
                <div class="container">
  <div class="row">
    <!-- Has Variants -->
    <div class="col-6 mb-3">
      <div class="form-group">
        <label for="has_variants">{{ __('dashboard.has_variants') }}:</label>
        <select id="has_variants" name="has_variants" class="form-control">
          <option value="0" selected>{{ __('dashboard.no') }}</option>
          <option value="1">{{ __('dashboard.yes') }}</option>
        </select>
      </div>
    </div>

    <!-- Price -->
    <div class="col-6 mb-3 priceclass">
      <div class="form-group">
        <label for="price">{{ __('dashboard.price') }}:</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="{{ __('dashboard.price') }}">
      </div>
    </div>

    <!-- Manage Stock -->
    <div class="col-6 mb-3 manage_stockclass">
      <div class="form-group">
        <label for="manage_stock">{{ __('dashboard.manage_stock') }}:</label>
        <select id="manage_stock" name="manage_stock" class="form-control">
          <option value="0" selected>{{ __('dashboard.no') }}</option>
          <option value="1">{{ __('dashboard.yes') }}</option>
        </select>
      </div>
    </div>

    <!-- Quantity -->
    <div class="col-6 mb-3 quantityclass">
      <div class="form-group">
        <label for="quantity">{{ __('dashboard.quantity') }}:</label>
        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="{{ __('dashboard.quantity') }}">
      </div>
    </div>

    <!-- Has Discount -->
    <div class="col-6 mb-3">
      <div class="form-group">
        <label for="has_discount">{{ __('dashboard.has_discount') }}:</label>
        <select id="has_discount" name="has_discount" class="form-control">
          <option value="0" selected>{{ __('dashboard.no_discount') }}</option>
          <option value="1">{{ __('dashboard.has_discount') }}</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Discount Section -->
  <div class="row discount-section" style="display: none;">
    <div class="col-6 mb-3">
      <div class="form-group">
        <label for="discount">{{ __('dashboard.discount') }}:</label>
        <input type="number" class="form-control" name="discount" id="discount" placeholder="{{ __('dashboard.discount') }}">
      </div>
    </div>

    <div class="col-6 mb-3">
      <div class="form-group">
        <label for="start_discount">{{ __('dashboard.start_discount') }}:</label>
        <input type="date" class="form-control" id="start_discount" name="start_discount">
      </div>
    </div>

    <div class="col-6 mb-3">
      <div class="form-group">
        <label for="end_discount">{{ __('dashboard.end_discount') }}:</label>
        <input type="date" class="form-control" id="end_discount" name="end_discount">
      </div>
    </div>
  </div>

  <!-- Add More Button -->
  <div class="row">
    <div class="col-12">
      <button class="btn btn-primary add_more_ed mt-3">+ {{ __('dashboard.add_more') }}</button>
    </div>
  </div>
  <div class="attributeValuesContainer" ></div>
</div>
                    
                {{-- @for ($i = 0; $i < $valueRowCount; $i++) --}}
             
                  
{{-- </form> --}}
        
        </div>
        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
            {{-- <form id="step-3-form"  method="POST">
                @csrf --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="images"> {{ __('dashboard.product_images') }} :</label>
                            <input type="file" name="image[]" id="image" class="form-control" accept="image/*" multiple>
                            <p></p>
                        </div>
                    </div>
                </div>
        {{-- </form> --}}
        </div>

        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
            {{-- <form id="step-4-form" > --}}
                {{-- @csrf --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            
            <button class="btn btn-success  pull-right  mb-3 ml-1" id="su" type="submit"
            >{{ __('dashboard.confirm') }}!</button>
                        </div>
                    </div>
                </div>
        {{-- </form> --}}
        </div>
   
   
    </div>

</form>
    <!-- Include optional progressbar HTML -->
    <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Make sure this is before SmartWizard JS -->
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>
<script>





          
      










 var lang = "{{ app()->getLocale() }}";
let rowvalue=0;
let attrvalue = @json($Attribute);  // Laravel Blade will encode the value as JSON
    console.log(Array.isArray(attrvalue));  // This will check if it's an array
    console.log(attrvalue); 

let v=``;
$(document).on('click', '.add_more_ed', function (e) {
    e.preventDefault();
  
    rowvalue++;

    var len = `
        <div class="row">
            <hr>
            <div class="col-3">
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input name="prices[${rowvalue}]" type="number" class="form-control" placeholder="Product Price">
                    <p></p>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="price">Product Quantity</label>
                    <input name="quantities[${rowvalue}]" type="number" class="form-control" placeholder="Product Quantity">
                    <p></p>
                </div>
            </div>`;

    // Check if rowvalue > 0 and loop through the attributes
    if (rowvalue > 0 && Array.isArray(attrvalue)) {
        for (let index = 0; index < attrvalue.length; index++) {
            len += `
            <div class="col-3">
                <div class="form-group">
                    <label for="price">Product Attribute</label>
                    <select name="attributeValues[${rowvalue}][${index}]" class="form-control">
                        <option value="" selected>Select</option>`;
            
            // Here you can dynamically generate options for each attribute
            attrvalue[index].attributrvalues.forEach(attributrvalues => {
                let optionValue = lang === 'en' ? attributrvalues.value.en : attributrvalues.value.ar;
                len += `<option value= "  ${attributrvalues.id}">${optionValue}</option>`;
            });

            len += `
                    </select>
                </div>
            </div>`;
        }
    }

    len += `</div>`;

    // Append the generated row to the container
    $('.attributeValuesContainer:last').after(len);
});












     var statud2=false;
     var statud1=false;
     var statud3=false;



     $(document).ready(function(){
      //  $('.manage_stockclass').hide();  
      //  $('.priceclass').hide();  
      $('form input, form textarea, form select').on('input', function () {
    var formData = new FormData();
    
    
    $('form').find('input, textarea, select').each(function () {
        var name = $(this).attr('name');
        var value = $(this).val();
        
        
        if ($(this).attr('type') === 'file') {
            var file = $(this)[0].files[0];  // Get the file from the input
            if (file) {
                formData.append(name, file);
            }
        } else {
            formData.append(name, value);
        }
    });

    console.log(formData);  // For debugging purposes

    // Make the AJAX request
    $.ajax({
        url: "{{ route('dashpoard.produect.validationstep3') }}",  // Your route
        method: 'POST',
        data: formData,
        processData: false,  // Don't process data as a query string
        contentType: false,  // Don't set content type (needed for file uploads)
        success: function (response) {
            var error = response.errors;
           if (response.status==false) {
            if(error["image"]){
console.log(error["image"]);

    $('#image').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["image"]);
    statud3= false; 
    console.log(statud3);
   }else{
    $('#image').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
           }else{
            $('#image').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
            statud3=true;
            console.log(statud3);
            
           }
        },
      
    });
});












            $('#image').fileinput({
                theme: 'fa5',
                allowedFileTypes: ['image'],
                maxFileCount: 5,
                enableResumableUpload: false,
                showUpload: false,

            });
      $('#manage_stock').val('0');
      $('#has_variants').val('0');
     
 $('#has_discount').on('change', function() {
        if ($(this).val() == '1') {
            $('.discount-section').slideDown(); // Show discount fields
        } else {
            $('.discount-section').slideUp(); // Hide discount fields
        }
    });

    // Trigger change on page load in case the value is already 1
    $('#has_discount').trigger('change');





     $('#manage_stock').change(function() {
        var selectedValue = $(this).val();

        if (selectedValue == '1') {
            $('.priceclass').show(); 
            $('.quantityclass').show(); // Show the input field if 'Option 1' is selected
        } else {
            $('.priceclass').hide(); 
            $('.quantityclass').hide();
            // Hide the input field for other options
        }
    });
      var formData = {}; 




      $('form').on('submit', function(event) {
                event.preventDefault();



                 var formData = new FormData(this);
                 console.log(formData);
//                 for (var pair of formData.entries()) {
//     console.log(pair[0]+ ': ' + pair[1]);
// }
                
                $.ajax({
                    url: "{{ route('dashpoard.produect.submitbroudect') }}", // Route to the controller method
                   method:'POST',
                    data: formData,
                    processData: false, // Important for FormData to not be processed as a query string
                    contentType: false, 
                    success: function(response) {

                      if (response.status==true) {
                        window.location.href = "{{ route('dashpoard.produect.create') }}";
                      }
                      
                      // Display success message
                    },


      });
    });







       

        $('form input ,form textarea, form select').on('input', function () {

            $('form').find('input, textarea, select').each(function () {
    var name = $(this).attr('name');
    var value = $(this).val();
    formData[name] = value;
    console.log(value);

});

console.log(formData);

// $manage_stock=$('#manage_stock').val();
// $has_variants=$('#has_variants').val();
// if ($has_variants ==0) {
//     $('.manage_stockclass').show();
// }else{
//     $('.manage_stockclass').hide();  
// }
// if ($has_variants ==0 && $manage_stock==1) {
//     $('.priceclass').show();
// }else{
//     $('.priceclass').hide();  
// }
$.ajax({
                    url: "{{route('dashpoard.produect.validtionstep2')}}",
                    method: 'POST',
                    data: formData,
                
                    success: function (response) {
                        var error=response.errors;
console.log(error);

                        if (response.status==false) {
    if(error["has_variants"]){
console.log(error["nhas_variants"]);

    $('#has_variants').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["has_variants"]);
    statud2= false; 
    console.log(statud1);
   }else{
    $('#has_variants').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
      
   
   if(error["has_discount"]){
console.log(error["has_discount"]);

    $('#has_discount').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["has_discount"]);
    statud2= false; 
    console.log(statud1);
   }else{
    $('#has_discount').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
   if(error["price"]){
console.log(error["price"]);

    $('#price').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["price"]);
    statud2= false; 
    console.log(statud1);
   }else{
    $('#price').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
   if(error["quantity"]){
console.log(error["quantity"]);

    $('#quantity').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["quantity"]);
    statud2= false; 
    console.log(statud1);
   }else{
    $('#quantity').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
   if(error["manage_stock"]){
console.log(error["manage_stock"]);

    $('#manage_stock').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["manage_stock"]);
    statud2= false; 
    console.log(statud1);
   }else{
    $('#manage_stock').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
   
  
                    }else{
                        $('#has_variants').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');

                        $('#price').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');

                        $('#manage_stock').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');

                        $('#quantity').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');

                    

                        console.log(error);
                        statud2=true;
                        
                    }
                }
        });
        });

   $('#smartwizard').smartWizard({
    

   

    selected: 0,  // Initial selected step
        theme: 'basic',  // Theme for the wizard
        transitionEffect: 'fade',  // Transition effect
        showStepURLhash: false,  // Do not change the URL hash when navigating
        lang: {   // Custom language labels (optional)
            next: 'Next',
            previous: 'Previous',
        },
        toolbarSettings: {
            toolbarPosition: 'top',  // Position the toolbar at the top
            showNextButton: true,   // Show the Next button
            showPreviousButton: true,   // Show the Previous button
        },
  
  // Callback function for content loading
});
     



$('form input ,form textarea, form select').on('input', function () {

     // Initialize an empty object to hold form input data

// Loop through each input field and store its name and value in the formData object
$('form').find('input, textarea, select').each(function () {
    var name = $(this).attr('name');
    var value = $(this).val();
    formData[name] = value;
    console.log(value);

});

console.log(formData);

    // let field = $(this);
    //             let fieldName = field.attr('name');
    //             let fieldValue = field.val();
    //             console.log(fieldName);
    //     console.log(fieldValue);

        $.ajax({
                    url: "{{route('dashpoard.produect.store')}}",
                    method: 'POST',
                    data: formData,
                
                    success: function (response) {
                        var error=response.errors;

   
   if (response.status==false) {
    if(error["name.ar"]){
console.log(error["name.ar"]);

    $('#name_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["name.ar"]);
    statud1= false; 
    console.log(statud1);
   }
   
   else{
    $('#name_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
//     else{
//     statud1= true; 
//     // console.log(statud1);
//    }

   if(error["name.en"]){
    console.log(error["name.en"]);
    $('#name_en').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["name.en"]);
    statud1= false; 
    console.log(statud1);
}
if(!error["name.en"]){
    console.log('dddddddddd');
    
    $('#name_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
}
if(error["small_desc.ar"]){


    $('#small_desc_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["small_desc.ar"]);
    statud1= false; 
    console.log(statud1);
   }
   
   else{
    $('#small_desc_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }



   if(error["small_desc.en"]){


    $('#small_desc_en').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["small_desc.en"]);
    statud1= false; 
    console.log(statud1);
   }
   
   else{
    $('#small_desc_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }

   if(error["category_id"]){


$('#category_id').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["category_id"]);
statud1= false; 
console.log(statud1);
}

else{
$('#category_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
}




if(error["brand_id"]){


$('#brand_id').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["brand_id"]);
statud1= false; 
console.log(statud1);
}
else{
$('#brand_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
}

if(error["tags"]){


$('#tags').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["tags"]);
statud1= false; 
console.log(statud1);
}
else{
$('#tags').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
}
if(error["sku"]){


$('#sku').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["sku"]);
statud1= false; 
console.log(statud1);
}
else{
$('#sku').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
}



if(error["available_for"]){


$('#available_for').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["available_for"]);
statud1= false; 
console.log(statud1);
}
else{
$('#available_for').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
}

// else{
//     statud1= true;   
// }



if(error["desc.en"]){
    $('#desc_en').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["desc.en"]);
    statud1= false; 
    console.log(statud1);
}else{
    $('#desc_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }
// else{
//     statud2= true;   
// }
if(error["desc.ar"]){
    $('#desc_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["desc.ar"]);
    statud1= false; 
    console.log(statud2);
}else{
    $('#desc_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
   }

// if (!error["desc.ar"] &&  !error["desc.en"]) {
//     statud2= true; 
//     console.log(statud2);
//     console.log(error["desc.en"]);
//     console.log(error["desc.ar"]);
    
// }
console.log(error);


// else{
//     statud2= true;   
// }

   }else{
    $('#name_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#name_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#desc_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#desc_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#tags').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#brand_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#category_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#small_desc_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#small_desc_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#sku').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    $('#available_for').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(' ');
    
    console.log(error);
    
    statud1= true; 
console.log(statud1);
console.log('ddddddddddddddd');

   }
//    if (!error["name.en"] &&  !error["name.ar"]) {


// }

                        }
                  
                });
            });

        // if (name === '') {
        //     $('#name-error').text('Name is required');
        // } else {
        //     $('#name-error').text('');
        // }
    // });
    // $('#name_en').on('input', function () {
    //     var name = $(this).val();
    //     console.log(name);
        
    //     if (name === '') {
    //         $('#name_en_error').text('Name is required');
    //     } else {
    //         $('#name_en_error').text('');
    //     }
    //     if (name.length  <=7) {
    //         $('#name_en_error').text('Name is required').addClass('in');
    //     } else {
    //         $('#name_en_error').text('');
    //     }
    // });
   
    $('#smartwizard').on("leaveStep", function(e, anchorObject, stepIndex, stepDirection) {
        if (stepIndex==2) {
          return  statud3; 
        }
        if (stepIndex==1) {
             var form = $(this).find('form').eq(stepIndex);
            //  console.log(form[0]);
         var   formData=new FormData(form[0]);
                // console.log(new FormData(form[0]));
               
            //     $.ajax({
            //         url: "{{route('dashpoard.produect.validtionstep2')}}",
            //         method: 'POST',
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function (response) {
            //             if (response.valid) {
            //                 statud2= true;  // Proceed to next step
            // } else {
            //     alert('Validation failed on the server side.');
            //     statud2= false;  // Prevent moving to the next step
            // }
            //         },
            //     });
               
                     
                return statud2;
         
        }
        if (stepIndex==0) {
            console.log(stepIndex);
            
            var form = $(this).find('form').eq(stepIndex);
             console.log(form[0]);
         var   formData=new FormData(form[0]);
                // console.log(new FormData(form[0]));
               
            //     $.ajax({
            //         url: "{{route('dashpoard.produect.validtionstep1')}}",
            //         method: 'POST',
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function (response) {
            //             if (response.valid) {
            //                 statud1= true;  // Proceed to next step
            // } else {
                
            //     statud1= false;  // Prevent moving to the next step
            // }
            //         },
            //     });
               console.log(statud1);
               
                     
                return statud1;
                
        }
        
                // var form = $(this).find('form').eq(stepIndex);
                // console.log(form[0]);
                // var formData = new FormData(form[0]);
                // if (form[0].checkValidity() === true) {
                //     return false;  // Prevent moving to the next step
                // }
                
            //     $.ajax({
            //         url: "{{route('dashpoard.produect.validtionstep2')}}",
            //         method: 'POST',
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function (response) {
            //             if (response.valid) {
            //     return true;  // Proceed to next step
            // } else {
            //     alert('Validation failed on the server side.');
            //     return false;  // Prevent moving to the next step
            // }
            //         },
            //     });
            });

        
        });   
           
    </script> 
@endsection
