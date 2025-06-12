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
                          <li class="breadcrumb-item"><a href="{{ route('dashpoard.Role.index') }}">Country</a>
                          </li>
                          <li class="breadcrumb-item active"><a href="#">Create Country</a>
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
@include('dashboard.includes.erreors')
@include('dashboard.includes.sucess')
              <div class="card-content">
                  <div class="card-body">
                      <a href="{{ route('dashpoard.Admin.create') }}" class="btn btn-primary">{{ __('dashboard.add') }}</a><br><br>
                      <table class="table table-responsive-sm">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">{{ __('dashboard.name') }}</th>
                                  <th scope="col">{{ __('dashboard.phone_code') }} </th>
                                  <th scope="col">{{ __('dashboard.num_of_governorates') }} </th>
                                  <th scope="col">{{ __('dashboard.num_of_users') }} </th>
                                  <th scope="col">{{ __('dashboard.status') }} </th>
                                  <th scope="col">{{ __('dashboard.status_management') }} </th>
                              </tr>
                          </thead>
                          <tbody>

                              @forelse ($countries as $country)
                                  <tr>
                                      <th scope="row">{{ $country->iteration }}</th>
                                      <td>
                                        <a href="{{route('dashpoard.countries.governorates.index',$country->id)}}">{{ $country->name }}</a>
                                         <i class="flag-icon flag-icon-{{ $country->flag_code }}"></i> </td>
                                      <td>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input disabled type="text" class="form-control" id="iconLeft"
                                                value="{{ $country->phone_code }}">
                                            <div class="form-control-position">
                                                <i class="ft-phone-call primary"></i>
                                            </div>
                                        </fieldset>
                                    </td>
                                    <td>
                                      <div class="badge badge-pill badge-border border-success success">
                                          {{ $country->governorates_count}}</div>
                                  </td>
                                  <td>
                                      <div  class="badge badge-pill badge-border border-primary success lg">
                                          {{ $country->users_count}}
                                      </div>
                                  </td>

                                  <td>
                                      <div id="status_{{ $country->id }}" class="badge badge-pill badge-border border-info success lg">
                                          {{ $country->is_active }}</div>
                                  </td>

                                  <td>
                                      <input type="checkbox" class="switch change_status"
                                          country-id={{ $country->id }} id="switch5"
                                          @if ($country->is_active == 'Active' || $country->is_active == 'مفعل') checked @endif
                                          data-group-cls="btn-group-sm" />
                                  </td>
                                   
                                     
                                  </tr>


                                  {{-- delete form  --}}
                               


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
        $(".change_status").change(function(e){
            var id = $(this).attr('country-id');
            var url = "{{ route('dashpoard.countries.status', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
              

                success: function(response) {
                    if (response.status == true) {

                         $('.tostar_success').text(response.message);
                         $('.tostar_success').show();

                         // change status
                         $('#status_' + response.data.id).empty();
                         $('#status_' + response.data.id).text(response.data.is_active);

                     } else {
                         $('#tostar_error').show();
                         $('#tostar_error').text(data.message);
                     }
                     setTimeout(function() {
                         $('.tostar_success').hide();
                     }, 5000);

                

            }});




}); 
// }); 
    </script>
@endsection
