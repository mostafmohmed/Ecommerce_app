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
                                    data-target="#attributescreateModal">
                                    {{ __('dashboard.create_attribute') }}
                                </button>
 @include('dashboard.attributes.create')
 @include('dashboard.attributes.edite')

                                {{-- modal --}}
                            
                                {{-- end create&edit coupon modal --}}
                                <table id="yajra_table" class="table table-striped table-bordered language-file">
                                    <thead>
                                      <tr>
                                        <th>id</th>
                                        <th>{{ __('dashboard.attribute_name') }}</th>
                                        <th>{{ __('dashboard.attribute_values') }}</th>
                                        <th>{{ __('dashboard.created_at') }}</th>
                                        <th>{{ __('dashboard.actions') }}</th>
                                       
                                        
                                      </tr>
                                    </thead>
            <body>
                
            </body>
                                  
                                  </table>
                            

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
 <script src="https://cdn.datatables.net/buttons/3.2.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.colVis.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.print.min.js"></script>
<script src="{{asset('dash')}}/jszip.js" ></script>
<script src="{{asset('dash')}}/pdfmake.min.js" ></script>
<script src="{{asset('dash')}}/vfs_fonts.js" ></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js" ></script>
<script src="https://cdn.datatables.net/colreorder/2.0.4/js/dataTables.colReorder.min.js"></script>


<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.min.js" ></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.bootstrap5.min.js" ></script>



<script src="https://cdn.datatables.net/select/3.0.0/js/dataTables.select.min.js" ></script>
<script src="https://cdn.datatables.net/select/3.0.0/js/select.bootstrap5.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        let inde=10;
        
    $(document).on('click', '.add_more_ed', function (e) {
        e.preventDefault();
       
       
        var len=`<div class="row attributeValuesContainer">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">{{ __('dashboard.attribute_value_ar') }}</label>
                    <input type="text" name="value[${inde}][ar]" class="form-control" id="code"
                        placeholder="{{ __('dashboard.attribute_value_ar') }}">
                    <strong class="text-danger" id="error_code"></strong>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">{{ __('dashboard.attribute_value_en') }}</label>
                    <input type="text" name="value[${inde}][en]" class="form-control" id="code"
                        placeholder="{{ __('dashboard.attribute_value_en') }}">
                    <strong class="text-danger" id="error_code"></strong>
                </div>
            </div>
            <div class="col-md-2 mt-2">
                <button disabled type="button" class="btn btn-danger remove"><i class="ft-x"></i></button>
            </div>
        </div>`;
        $('.attributeValuesContainer:last').after(len);
        inde++;
console.log(inde);

    });

$(document).on('submit', '.update_attr', function (e) {
e.preventDefault();
var data=new FormData(this)
console.log(data);
var  id=$('#id_ed').val();
var currentPage=$('#yajra_table').DataTable().page();
$.ajax({
url:"{{route('dashpoard.attribute.update','id')}}".replace('id',id),
method: 'post',
data:data,
processData: false,
 contentType: false,
 success:function(respose){
// console.log(respose.sucess);
if (respose.status=='sucess') {
    $('#yajra_table').DataTable().page(currentPage).draw(false) ;
    $('#attributesediteeModal').modal('hide');
    
    Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: respose.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                      
}else{
    $('#attributesediteeModal').modal('hide');
    Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: respose.message,
                            showConfirmButton: false,
                            timer: 1500
                        });  
}

 }
});

})

$(document).on('click', '.edit_attr', function (e) {
var id= $(this).data('id');
var name_ar =$(this).data('name_ar');
var name_en =$(this).data('name_en');
console.log(name_en);

var values =$(this).data('values');
// console.log(values);
$('.attributeValuesContainer').empty() ;
$('#name_ar_ed').val(name_ar);
$('#name_en_ed').val(name_en);
$('#name_en_ed').val(name_en);
$('#id_ed').val(id);

var contrnter=$('.attributeValuesContainer:last');
contrnter.empty();

for (let index = 0; index < values.length; index++) {
    var element = values[index];
// console.log(element);
contrnter.after(`
 <div class="row attributeValuesContainer">
                    <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">{{ __('dashboard.attribute_value_ar') }}</label>
                                        <input type="text" name="value[${element.id}][ar]" class="form-control" id="code"
                                            value="${element.value_ar}"
                                            placeholder="{{ __('dashboard.attribute_value_ar') }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">{{ __('dashboard.attribute_value_en') }}</label>
                                        <input type="text" name="value[${element.id}][en]" class="form-control" id="code"
                                            value="${element.value_en}"
                                            placeholder="{{ __('dashboard.attribute_value_en') }}">
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <button  type="button" class="btn btn-danger remove"><i class="ft-x"></i></button>
                    </div>
                    </div>

`);
$('#attributesediteeModal').modal('show');
    
}
} );







     let ind=10;
    $(document).on('click', '.add_more', function (e) {
        e.preventDefault();
       
       
        var len=`<div class="row attribute_values_row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">{{ __('dashboard.attribute_value_ar') }}</label>
                    <input type="text" name="value[${ind}][ar]" class="form-control" id="code"
                        placeholder="{{ __('dashboard.attribute_value_ar') }}">
                    <strong class="text-danger" id="error_code"></strong>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">{{ __('dashboard.attribute_value_en') }}</label>
                    <input type="text" name="value[${ind}][en]" class="form-control" id="code"
                        placeholder="{{ __('dashboard.attribute_value_en') }}">
                    <strong class="text-danger" id="error_code"></strong>
                </div>
            </div>
            <div class="col-md-2 mt-2">
                <button disabled type="button" class="btn btn-danger remove"><i class="ft-x"></i></button>
            </div>
        </div>`;
        $('.attribute_values_row:last').after(len);
        ind++;
console.log(ind);

    });
















    $(document).on('submit', '#createattrubute', function (e) {
        e.preventDefault();
        var data=new FormData(this);
        console.log(data);
        
        $.ajax({
url:"{{route('dashpoard.attribute.store')}}",
method: 'post',
data:data,
processData: false,
 contentType: false,
 success:function(respose){
console.log(respose.sucess);


 }
});

    });







</script>
   <script>
      var lang = "{{ app()->getLocale() }}";
    var table = $('#yajra_table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,

            colReorder: true,
            // rowReorder: {
            //     update: false,
            //     selector: "td:not(:first-child)",
            // },
            // scroller: true,
            // scrollY: 900,
            select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for Coupon : ' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashpoard.getallattribute') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                }, {
                    data: 'name',
                    name: 'name',

                }, {
                    data: 'attributrvalues',
                    name: 'attributrvalues',

                }, {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false,
                },

            ],

            layout: {
                topStart: {
                    buttons: ['colvis', 'copy', 'print', 'excel', 'pdf']
                }
            },


            language: lang === 'ar' ? {
                url: '//https://cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
            } : {},


        });

   </script>
 @endsection