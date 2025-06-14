@section('content')
@extends('healper.dash.parical')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="card w-100 p-3">
                <!-- Card Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ __('dashboard.governorates') }}</h4>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <!-- Contact Sidebar -->
                        <div class="col-md-3 d-none d-lg-block">
                            @livewire('dashboard.contact.contact-sidebar')
                        </div>

                        <!-- Contact Messages -->
                        <div class="col-md-5">
                         <!-- Contact Messages Page -->
<div class="email-app-list">
    <div class="card-body">
        <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
            <input type="text"  id="search" class="form-control" placeholder="Search email">
            <div class="form-control-position">
                <i class="ft-search"></i>
            </div>
        </fieldset>
    </div>
    <div class="list-group">
      @foreach ($massages as $massage)
      <a href="#"   data-show-id={{$massage->id}} id="light-{{$massage->id}}" class="showMessage media border-0 {{$massage->is_reade ? 'bg-light' : ''}}">
        <div class="media-left pr-1">
            <span class="avatar avatar-md">
                <span class="media-object rounded-circle text-circle bg-info">T</span>
            </span>                </div>
        <div class="media-body w-100">
            <h6 class="font-weight-bold">
                <span class="float-right text-muted">{{ $massage->created_at->diffForHumans() }}</span>
            </h6>
            <p class="text-bold-600 mb-0"> </p>
            <p class="mb-0 text-muted">{{Str::limit($massage->massage,50),}}
                <span class="float-right">
                    <span id="mark-status-{{$massage->id}}" class="badge badge-{{ $massage->is_reade ? 'success' : 'danger' }}">
                        {{ $massage->is_reade ? 'Read' : 'New' }}
                    </span>
                </span>
            </p>
        </div>
    </a>
      @endforeach
         
        {{-- @empty
            <div class="text-center p-3">No Messages Found</div>
        @endforelse
        {{ $messages->links('vendor.livewire.simple-bootstrap') }} --}}

    </div>
</div>
                        </div>

                        <!-- Contact Show (Message Details) -->
                        <div class="col-md-4 massage_contect">
                           
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer text-center">
                    {{-- @livewire('dashboard.contact.replay-contact') --}}
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
 
    
$(document).on('click', '.showMessage', function() {

    var massage_id=$(this).data('show-id');
console.log('jgjh');

console.log(massage_id);

$.ajax({
            url: `/{{ LaravelLocalization::getCurrentLocale() }}/dashpoards/contact_details/${massage_id}`,
            type: 'GET',
           
            success: function(data) {
                $('.massage_contect').empty();
              
                $('.massage_contect').append(`
                    <div class="content-wrapper">
                        <div class="content-body">
                            <div class="card email-app-details d-none d-lg-block">
                                <div class="card-content">
                                    <div class="email-app-options card-body d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Reply"><i class="la la-reply"></i></button>
                                            <button type="button" class="btn btn-warning" data-toggle="tooltip" title="Report Spam"><i class="ft-alert-octagon"></i></button>
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="ft-trash-2"></i></button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">More</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item mark_unreade" id="unreade-${data.massage.id}"   mark-id="${data.massage.id}"  href="#">Mark fas Unread</a>
                                                <a class="dropdown-item" href="#">Force Delete</a>
                                                <a class="dropdown-item" href="#">Restore</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="email-app-title card-body">
                                        <h3 class="list-group-item-heading"></h3>
                                        <p class="list-group-item-text"><span class="badge badge-primary">Show Message</span></p>
                                    </div>

                                    <div class="media-list">
                                        <div class="card-header p-0">
                                            <div class="email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                                <div class="media-left pr-1">
                                                    <span class="avatar avatar-md">
                                                       
                                                    </span>
                                                </div>
                                                <div class="media-body w-100">
                                                    <h6 class="list-group-item-heading">From: ` + data.massage.name + `</h6>
                                                    <p class="list-group-item-text"><span class="float-right text-muted">` + data.massage.created_at + `</span></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-collapse collapse show">
                                            <div class="card-body">
                                                <p>` + data.massage.massage + `</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            }
});
    // Your logic here to show the message, maybe another AJAX call or UI update
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click', '.mark_unreade', function() {
var id =$(this).attr('mark-id');
console.log(id);
$.ajax({
            url: `/{{ LaravelLocalization::getCurrentLocale() }}/dashpoards/mark_unreade/${id}`,
            type: 'POST',
             success: function(data) {
                if (data.status==true) {
                    $('#mark-status-'+data.mark.id).removeClass('badge-success');
                    
                    $('#light-'+data.mark.id).removeClass('bg-light');
$('#mark-status-'+data.mark.id).addClass('badge-danger');
$('#mark-status-'+data.mark.id).text('Read');
                }


            }
});



    });
$(document).ready(function() {


// $('.showMessage').on('click',function() {


    
// });


    $('#search').on('keyup', function() {
        var query = $(this).val();

        $.ajax({
            url: "{{route('dashpoard.contact_search')}}",
            type: 'GET',
            data: { query: query },
            success: function(data) {
                var html = '';
                if (data.length > 0) {
                    data.forEach(function(msg) {
                        html += `
                        <a href="#"  data-show-id="${msg.id}"  class="showMessage media border-0${msg.is_reade?'bg-light' : ''}">
                            <div class="media-left pr-1">
                                <span class="avatar avatar-md">
                                    <span class="media-object rounded-circle text-circle bg-info">
                                        ${msg.name.charAt(0).toUpperCase()}
                                    </span>
                                </span>
                            </div>
                            <div class="media-body w-100">
                                <h6 class="font-weight-bold">${msg.name}
                                    <span class="float-right text-muted">${new Date(msg.created_at).toLocaleString()}</span>
                                </h6>
                                <p class="text-bold-600 mb-0"></p>
                                <p class="mb-0 text-muted">
                                    ${msg.massage.slice(0, 50)}
                                    <span class="float-right">
                                        <span class="badge badge-${msg.is_reade ? 'success' : 'danger'}">
                                            ${msg.is_reade ? 'Read' : 'New'}
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </a>`;
                    });
                } else {
                    html = '<div class="text-center p-3">No Messages Found</div>';
                }
                $('.list-group').html(html);
            }
        });
    });
});




   </script>
  
@endsection