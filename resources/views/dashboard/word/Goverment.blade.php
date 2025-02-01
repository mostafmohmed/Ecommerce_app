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
                          <li class="breadcrumb-item"><a href="{{ route('dashpoard.Role.index') }}">Roles</a>
                          </li>
                          <li class="breadcrumb-item active"><a href="#">Create Role</a>
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
                  <h4 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.roles') }} </h4>
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
                                  <th scope="col">{{ __('dashboard.country') }} </th>
                                  <th scope="col">{{ __('dashboard.num_of_cities') }} </th>
                                  <th scope="col">{{ __('dashboard.num_of_users') }} </th>
                                  <th scope="col">{{ __('dashboard.status') }} </th>
                                  <th scope="col">{{ __('dashboard.status_management') }} </th>
                                  <th scope="col">{{ __('dashboard.shipping_price') }} </th>
                                  <th scope="col">{{ __('dashboard.change_price') }} </th>
                              </tr>
                          </thead>
                          <tbody>

                              @forelse ($Govs as $k=> $Gov)
                                  <tr>
                                      <td scope="row">{{ $k+1 }}</td>
                                      <td>
                                        {{ $Gov->name }}
                                      </td>
                                      <td>
                                        {{ $Gov->country->name }}
                                      </td>
                                      <td>
                                      <div class="badge badge-pill badge-border border-success success">
                                          {{ $Gov->getcitiescount() }}</div>
                                  </td>
                                  <td>
                                      <div  class="badge badge-pill badge-border border-primary success lg">
                                          {{$Gov->getuserscount() }}
                                      </div>
                                  </td>

                                  <td>
                                      <div id="status_{{ $Gov->id }}" class="badge badge-pill badge-border border-info success lg">
                                          {{ $Gov->getstatus() }}</div>
                                  </td>

                                  <td>
                                      <input type="checkbox" class="switch change_status"
                                          country-id={{ $Gov->id }} id="switch5"
                                          @if ($Gov->getstatus() == 'Active' || $Gov->getstatus() == 'مفعل') checked @endif
                                          data-group-cls="btn-group-sm" />
                                  </td>
                                   
                                  <td>
                                    <div id="price_{{ $Gov->id }}" class="">
                                        {{ $Gov->shippingPrice->price }} </div>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#change_price_{{ $Gov->id }}">
                                        {{ __('dashboard.change_price') }}
                                    </button>
                                </td>

                                     
                                  </tr>


                                  {{-- delete form  --}}
                               @include('dashboard.word.charge')


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
        $(document).on('submit', '.update_shipping_price', function(e) {
            e.preventDefault();

            var data = new FormData($(this)[0]);
            var gov_id = $(this).attr('gov-id');

            $.ajax({
                url: "{{ route('dashpoard.governorates.shipping-price') }}",
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'success') {

                        $('.tostar_success').text(response.message).show();


                        // change price
                        $('#price_' + response.data.id).empty();
                        $('#price_' + response.data.id).text(response.data.price);

                    }

                },

                error: function(data) {
                    var response = $.parseJSON(data.responseText);
                    $('#errors_'+gov_id).text(response.errors.price).show();
                },


            });
        });
    </script>
@endsection


