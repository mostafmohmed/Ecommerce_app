@section('content')
@extends('healper.dash.parical')
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
              <h3 class="content-header-title mb-0 d-inline-block">Basic Forms</h3>
              <div class="row breadcrumbs-top d-inline-block">
                  <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a
                                  href="{{ route('dashpoard.index') }}">{{ __('dashboard.dashboard') }}</a>
                          </li>
                          <li class="breadcrumb-item"><a href="{{ route('dashpoard.category.index') }}">category</a>
                          </li>
                          <li class="breadcrumb-item active"><a href="{{ route('dashpoard.category.create') }}">Create Role</a>
                          </li>
                      </ol>
                  </div>
              </div>
          </div>
          <div class="content-header-right col-md-6 col-12">
              <div class="dropdown float-md-right">
                  <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
                      type="button" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">Actions</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item"
                          href="#"><i class="la la-calendar-check-o"></i> Calender</a>
                      <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
                      <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                              class="la la-cog"></i> Settings</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="content-body">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title" id="basic-layout-colored-form-control">coupons</h4>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                      </button>
                  
                      @include('dashboard.question.sendmassage')
                      <table id="yajra-table" class="table table-striped table-bordered language-file">
                        <thead>
                          <tr>
                           
                            <th>#</th>
                            <th>{{ __('dashboard.code') }}</th>
                            <th>{{ __('dashboard.discount') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.limitation') }}</th>

                            
                            <th>{{ __('dashboard.actions') }}</th>
                            
                          </tr>
                        </thead>
<body>
    
</body>
                      
                      </table>
                    
                      {{-- {{ $roles->links() }} --}}
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






$(document).on('click','.delete_confiurm_bt',function(e){
    e.preventDefault();
    var coupon_id=$(this).attr('coupon_id');
  

});






































</script>



<script>

$(document).on('click','.delete_confiurm_bt',function(e){
    e.preventDefault();
    var coupon_id=$(this).attr('coupon_id');
      $('#copon_id').val( coupon_id );
$('#editCouponModal').modal('show');

});












    $('#yajra-table').DataTable({
        processing:true,
        serverSide:true,
        colReorder: true,
       
        select: true,

        responsive: {
        details: {
            display: DataTable.Responsive.display.modal({
                header: function (row) {
                    var data = row.data();
                    return 'Details for ' + data[0] + ' ' + data[1];
                }
            }),
            renderer: DataTable.Responsive.renderer.tableAll({
                tableClass: 'table'
            })
        }
    },
        ajax:"{{ route('dashpoard.questions.getall')}}",
        // columns:[
        //     {data:'id'}
        //     // {data:'code'},
        //     {data:'discount_perecentage'},
        //     {data:'is_active'},
        //     // {data:'limit'},
        //     // {data:'time_used'},
        //     // {data:'start_data'},
        //     // {data:'end_data'},
           
          
        //     // {data:'created_at'},
        //     // {data:'actions'},

            
            
        // ],
        columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'subject',
                    name: 'subject',
                },
                {
                    data: 'massage',
                    name: 'massage',

                },
             
             
                {
                    data: 'actions',
                    searchable: false,
                    orderable: false,
                },

            ],
        layout: {
        topStart: {
            buttons: ['colvis','copy','print','excel','pdf']
        },
    },
        });


      
    </script> 
   <script>
    $('#updateecoupon').on('submit',function(e){
        e.preventDefault();
 var data=new FormData(this);

$.ajax({
url:"{{route('dashpoard.questions.sendawnser')}}",
method: 'post',
data:data,
processData: false,
 contentType: false,
 success:function(respose){
  
   
   
    
    if (respose['status']==true) {
      
       
        $('#editCouponModal').modal('hide');  
        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: 'sucess send massage',
                            showConfirmButton: false,
                            timer: 1500
                        });
      



    }
   
    // console.log(respose.errors);
    
 }

});
    });
   </script>
  
@endsection