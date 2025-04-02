@extends('healper.dash.parical')
@section('cs')
<style>
.table td, .table th {
    vertical-align: middle;
}

.card-header h4 {
    font-size: 1.5rem;
    color: #4a4a4a;
}

.btn-group .btn {
    margin-right: 5px;
}

.carousel-inner img {
    max-height: 200px;
    object-fit: cover;
}
</style>
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.products_table') }}</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">{{ __('dashboard.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="">{{ __('dashboard.products') }}</a></li>
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
                                {{ __('dashboard.products') }}
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
                                <a href="" class="btn btn-outline-success mb-1">
                                    {{ __('dashboard.create_product') }}
                                </a>

                                <p class="card-text">{{ __('dashboard.table_yajra_paragraph') }}.</p>
                                <table id="yajra_table" class="table table-striped table-bordered language-file">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard.product_name') }}</th>
                                            <th>{{ __('dashboard.has_variants') }}</th>
                                            <th>{{ __('dashboard.images') }}</th>
                                            <th>{{ __('dashboard.status') }}</th>
                                            <th>{{ __('dashboard.sku') }}</th>
                                            <th>{{ __('dashboard.available_for') }}</th>
                                            <th>{{ __('dashboard.category') }}</th>
                                            <th>{{ __('dashboard.brand') }}</th>
                                            <th>{{ __('dashboard.price') }}</th>
                                            <th>{{ __('dashboard.quantity') }}</th>
                                            <th>{{ __('dashboard.actions') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($produect as $key => $item)
                                        <tr id ='row_{{$item->id}}'>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td> 
                                            <td>{{ $item->hasvraint() }}</td>    
                                            <td>
                                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach ($item->images as $key => $image)
                                                            <div class="carousel-item @if($key == 0) active @endif">
                                                                <img src="{{ asset('uploads/produect/' . $image->file_name) }}" class="d-block w-100" alt="...">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a href="#carouselExampleControls" class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a href="#carouselExampleControls" class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="mt-1">
                                                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#fullscreenModal_{{ $item->id }}">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </button>
                                                </div>
                                            </td>
                                            <td             id="status_{{$item->id}}">{{ $item->status() }}</td>
                                            <td>{{ $item->sku }}</td>
                                            <td>{{ $item->available_for }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->brand->name }}</td>
                                            <td>{{ $item->price() }}</td>
                                            <td>{{ $item->quantity() }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                        <a href="" class="edit_coupon btn btn-outline-success">
                                                            {{ __('dashboard.edit') }} <i class="la la-edit"></i>
                                                        </a>
                                                        <button product-id="{{ $item->id }}" type="button" class="btn btn-outline-info status_btn">
                                                            {{ __('dashboard.status_management') }} <i class="la la-stop"></i>
                                                        </button>
                                                        <a href="" class="btn btn-outline-primary ">
                                                            {{ __('dashboard.show_product') }} <i class="la la-eye"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete_produect_{{$item->id}}">
                                                            Launch demo modal
                                                          </button>
                                                          
                                                          <!-- Modal -->
                                                          <div class="modal fade" id="delete_produect_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_produectLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                              
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <h5 class="modal-title" id="cvLabel">Delete</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <input type="text" name="produect_id" value="{{$item->id}}" id="product_id_{{$item->id}}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary  " data-dismiss="modal">Close</button>
                                                                  <button type="button"  produect-id="{{$item->id}}" class="btn btn-primary deleteProductForm">delete</button>
                                                                </div>
                                                              </div>
                                                          
                                                            </div>
                                                          </div>
                                                    
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="fullscreenModal_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="fullscreenModalLabel">Fullscreen View</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="fullscreenCarousel" class="carousel slide" data-ride="carousel">
                                                                    <div class="carousel-inner">
                                                                        @foreach ($item->images as $key => $image)
                                                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                                <img src="{{ asset('uploads/produect/'.$image->file_name) }}" class="d-block w-100" alt="Fullscreen Image">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#fullscreenCarousel" role="button" data-slide="prev">
                                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#fullscreenCarousel" role="button" data-slide="next">
                                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                       
                                        @endforeach
                                        <div class="modal" id="changestatus" tabindex="-1" role="dialog" data-toggle="modal" data-target="#changestatus" aria-labelledby="changestatus" aria-hidden="true">>
                                            <div class="modal-dialog" role="document">
                                                <form action="">
                                              <div class="modal-content">
                                              
                                                    
                                                
                                                <div class="modal-header">
                                                  <h5 class="modal-title">Modal title</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="produect_id_c" id="produect_id_c">
                                                  <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary change_s">Save changes</button>
                                                  <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </form>
                                            </div>
                                          </div>
                                    </tbody>
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
   <script>



$(document).on('click', ' .deleteProductForm', function (e) {
    e.preventDefault();

    var productId = $(this).attr('produect-id'); // Get product ID from hidden input
    console.log(productId);
    
    $.ajax({
        url: "{{ route('dashpoard.produect.destroy','id') }}".replace('id',productId), // Adjust route if necessary
        method: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}',
          
        },
        success: function(response) {
            if (response.status === 'success') {
                // Remove the product row from the table
                $('#row_' + productId).remove();
                $('#delete_product_' + productId).modal('hide'); // Hide modal after success
            } else {
                alert(response.message); // Show an alert if something goes wrong
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
            alert('An error occurred while deleting the product.');
        }
    });
});













            $(document).on('click', '.status_btn', function(e) {
             var s=   $(this).attr('product-id');
             $('#changestatus').show();
             $('#produect_id_c').val(s);
            
            });




            $(document).on('click', '.change_s', function(e) {
             var produect_id=    $('#produect_id_c').val();

          







             $.ajax({
                    url: "{{route('dashpoard.produect.status')}}",
                    method: 'POST',
                    data: {
                        produect_id:produect_id,
                        _token: '{{ csrf_token() }}'  
                    },
                
                    success: function (response) {
                        $('#status_'+response.id).text(response.status);
                        $('#changestatus').hide();
                     
                    }
                });









            
            });
   </script>
@endsection