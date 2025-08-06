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
                            <li class="breadcrumb-item"><a href="{{ route('dashpoard.Role.index') }}">Admin</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Create Admin</a>
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
                    <h4 class="card-title" id="basic-layout-colored-form-control"> </h4>
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
                        <a href="{{ route('dashpoard.Admin.create') }}" class="btn btn-primary">{{ __('dashboard.add') }}</a><br><br>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('dashboard.name') }}</th>
                                    <th scope="col">{{ __('dashboard.email') }} </th>
                                          <th scope="col">password</th>
                                    <th scope="col">{{ __('dashboard.role') }} </th>
                                    <th scope="col">{{ __('dashboard.status') }} </th>
                                    <th scope="col">{{ __('dashboard.created_at') }} </th>
                                    <th scope="col">{{ __('dashboard.operations') }} </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($dmins as $dmin)
                                    <tr id="Admin-delete-{{$dmin->id}}" >
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $dmin->name }} </td>
                                        <td>{{ $dmin->email }} </td>
                                         <td>{{ $dmin->password }} </td>
                                             <td>{{ $dmin->role?->role}} </td>
                                            
                                                           <td>{{ $dmin->status }} </td>

                                       

                                        <td>{{ $dmin->created_at->format('Y-m-d') }} </td>
                                     
                                        <td>
                                            <div class="dropdown float-md-left">
                                                <button class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                    id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">Operations</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashpoard.Admin.edit', $dmin->id) }}"><i
                                                            class="la la-edit"></i>Edit</a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                       
                                                    class="la @if($dmin->status == 'Active') la-toggle-on @else la-toggle-off @endif"></i>@if($dmin->status == 'Active') Deactivate @else Activate @endif ><i
                                                            class="la la-trash"></i> Delete
                                                        </a>
                                                            <a class="dropdown-item delete_confiurm_bt" Admin_id="{{ $dmin->id}}"
                                                            href="javascript:void(0)"
                                                          ><i
                                                                class="la la-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    {{-- delete form  --}}
                                    {{-- <form id="delete-form-{{ $dmin->id }}"
                                        action="{{ route('dashpoard.Admin.destroy', $dmin->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}


                                @empty
                                    <td colspan="4"> No Data</td>
                                @endforelse
                            </tbody>
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
<script>
    $(document).on('click','.delete_confiurm_bt',function(e){
    e.preventDefault();
    var Admin_id=$(this).attr('Admin_id');
    console.log(Admin_id);
    
    Swal.fire({
                            position: "top",
                            icon: "warning",
                            title:'are you shuare delete',
                            showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
             if (result.isConfirmed) {
                $.ajax({
                    url: `/{{ LaravelLocalization::getCurrentLocale() }}/dashpoards/Admin/${Admin_id}`,
                    type:'DELETE',
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(respose){
if (respose.status==true) {
    $('Admin-delete-'respose.id).remove();
    Swal.fire({
                            
        title: 'sucess',
                                    text: 'sucess delete',
                                    icon: "success"
                           
    });

   
    
}else{
    Swal.fire({
                            
                            title: 'sucess',
                                                        text: 'fail  delete',
                                                        icon: "error"
                                               
                        });
}
                    },
                })
             } 
         });

});
</script>
@endsection