@section('content')
@extends('healper.dash.parical')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.faqs_table') }}</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="">{{ __('dashboard.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">
                                    {{ __('dashboard.faqs') }}</a>
                            </li>


                        </ol>
                    </div>
                </div>
            </div>
         
        </div>
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-11">
                <div class="content-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">
                                {{ __('dashboard.governorates') }}
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="card-body">

                                {{-- create coupon modal --}}
                                <button type="button" class="btn btn-outline-success mb-1 ml-1" data-toggle="modal"
                                    data-target="#FqscreateModal">
                                    {{ __('dashboard.create_faq') }}
                                </button>
 @include('dashboard.Fqs.create')
 @include('dashboard.Fqs.edite')
 @include('dashboard.Fqs.delete')
                                {{-- modal --}}
                            
                                {{-- end create&edit coupon modal --}}

                                <div class="col-xl-12 col-lg-12">
                                    <div class="mb-1">
                                        <h5 class="mb-0">Collapsible with Border Color</h5>
                                        {{-- <small class="text-muted">Use class <code>.border-COLOR</code>to collapse toggle for Collapse
                                        heading border color.</small> --}}
                                    </div>
                                  
                                    <div class="card faq_row" id="headingCollapse51">

                                        @forelse ($Faqs as $faqs)
                                        <div id="faq_div_{{$faqs->id}}">
                                         <div role="tabpanel" class="card-header border-success">
                                             <a  data-toggle="collapse"
                                                 href="#collapse51_" aria-expanded="true"
                                                 aria-controls="collapse51_"
                                                 class="font-medium-1 success" id="question_{{$faqs->id}}"> {{$faqs->question}}</a>
                                             <a fqs_id={{$faqs->id}} class="deletebtn" href=""><i class="la la-trash float-right"></i></a>
                                             <a data-target="#faqEditModal_" class="editbtn" fqs_id={{$faqs->id}} data-toggle="modal" href=""><i class="la la-edit float-right"></i></a>
                                         </div>
                                         <div id="collapse51_" role="tabpanel"
                                             aria-labelledby="headingCollapse51"
                                             class="card-collapse collapse  show "
                                             aria-expanded="true">
                                             <div id="answer_{{$faqs->id}}" class="card-body">
                                                {{$faqs->answer}}
                                             </div>
                                         </div>
                                        </div>

                                        @empty
                                        
                                    @endforelse

                                 </div>  
                                  
                                 
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 @section('js')
     <script> 




$(document).on('click', '.deletebtn', function (e) {
            e.preventDefault();
            var fqs_id = $(this).attr('fqs_id');
            
            $('#fqd_id').val(fqs_id);
            $('#faqdeleteModal_').modal('show');
         
           

        });

        $('.deleteFqs').on('submit',function(e){
            e.preventDefault();
    var  fqs_id=   $('#fqd_id').val();
  
            $.ajax({
                type: "DELETE",
                url:"{{route('dashpoard.Fqs.destroy','id')}}".replace('id',fqs_id),
                data:{
                  
                     _token:"{{csrf_token()}}"
                },
                success: function (response) {
                  
                       if (response.status==true) {
                        $('#faq_div_'+response.date.id).empty();
                        $('#faqdeleteModal_').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                       }else{
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: 'fail process',
                            showConfirmButton: false,
                            timer: 1500
                        });
                       }
                      
                        // console.log(response.student.name);
                        
                       
                  
                }
            });


        })

       













$('.updateFqs').on('submit',function(e){
        e.preventDefault();
 var data=new FormData(this);
var local ="{{ app()->getLocale()}}";
var fqs_id=$('#fqe_id').val();
$.ajax({
url:"{{route('dashpoard.Fqs.update','id')}}".replace('id',fqs_id),
method: 'post',
data:data,
processData: false,
 contentType: false,
 success:function(respose){
  if (respose.status==true) {
    $('#questione_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    $('#questione_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    $('#answere_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    $('#answere_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    var question = local=='ar'?respose.date.question.ar :respose.date.question.en;
    var answer = local=='ar'?respose.date.answer.ar :respose.date.answer.en;
    $('#faqEditModal_').modal('hide');
    $('#question_'+respose.date.id).empty().text(question);
    $('#answer_'+respose.date.id).empty().text(answer);
    $('#question_'+respose.date.id).removeClass('success').addClass('danger');
    
    Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: respose.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
   
  }
   
    
    
  
   
    // console.log(respose.errors);
    
 },error: function (data) {
   
   
   var error=data.responseJSON.errors;
   if(error["question.ar"]){
    $('#questione_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["question.ar"]);
   }
   if(error["question.en"]){
    $('#questione_en').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["question.en"]);
   }
 if (error["answer.en"]) {
    $('#answere_en').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["answer.en"]);
 }
 if (error["answer.ar"]) {
    $('#answere_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["answer.ar"]);
 }
  
  
}

});
    });

























$(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var fqs_id = $(this).attr('fqs_id');
            // alert(stud_id);
            $('#faqEditModal_').modal('show');
            $.ajax({
                type: "GET",
                url:"{{route('dashpoard.Fqs.edit','id')}}".replace('id',fqs_id),
                success: function (response) {
                    if (response.status == true) {
                       
                   
                        // console.log(response.student.name);
                        $('#answere_ar').val(response.fqs.answer.ar);
                        $('#answere_en').val(response.fqs.answer.en);
                        $('#questione_en').val(response.fqs.question.en);
                        $('#questione_ar').val(response.fqs.question.ar);
                        $('#fqe_id').val(response.fqs.id);
                    }
                },
                errors:function(data){
                    console.log('ffddfdf');
                    
                    // var error=data.responseJSON.errors;
              
                 
                    // $('#question_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.question.ar);
                  
                   
                }
            });
           

        });

















     $('#createFqs').on('submit',function(e){
        e.preventDefault();
 var data=new FormData(this);
var local ="{{ app()->getLocale()}}";
$.ajax({
url:"{{route('dashpoard.Fqs.store')}}",
method: 'post',
data:data,
processData: false,
 contentType: false,
 success:function(respose){
  if (respose.status==true) {
    $('#question_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    $('#question_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    $('#answer_en').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    $('#answer_ar').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text(" ");
    $('#createFqs')[0].reset();
     var question = local=='ar'? respose.fags.question.ar:respose.fags.question.en;
     var answer = local =='en'?respose.fags.answer.en:respose.fags.answer.ar
    $('.faq_row').prepend(`<div id="faq_div_"><div role="tabpanel" class="card-header border-success">
<a id="question_" data-toggle="collapse"
href="#collapse51_" aria-expanded="true"
aria-controls="collapse51_"
class="font-medium-1 success"> ${question}</a>
<a faq-id="" class="delete_confirm_btn" href="">
<i class="la la-trash float-right"></i></a>
<a data-target="#faqEditModal_" data-toggle="modal" href=""><i class="la la-edit float-right"></i></a>
                                         </div>
                                         <div id="collapse51_" role="tabpanel"
                                             aria-labelledby="headingCollapse51"
                                             class="card-collapse collapse  show "
                                             aria-expanded="true">
                                             <div id="answer_" class="card-body">
                                                ${answer}
                                             </div>
                                         </div>
                                        </div>`);
        $('#FqscreateModal').modal('hide'); 
        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
  }
   
    
    
  
   
    // console.log(respose.errors);
    
 },error: function (data) {
   
   
    var error=data.responseJSON.errors;
    $('#question_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["question.ar"]);
    $('#question_en').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["question.en"]);
    $('#answer_en').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["answer.en"]);
    $('#answer_ar').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error["answer.ar"]);
 }

});
    });
   </script>
 @endsection