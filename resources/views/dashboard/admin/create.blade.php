<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
@include('healper.dash.head')
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  @include('healper.dash.navbar')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('healper.dash.sidbar')
 
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 
  <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Basic Forms</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashpoard.Admin.index') }}">admins</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Create admin</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">Create admin</h4>
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
                    <div class="card-content collapse show">
                        <div class="card-body">
                            @include('healper.validtion')
                            <form class="form" action="{{ route('dashpoard.Admin.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>Create New admin</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Admin Name</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    placeholder="Name" name="name">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Admin Email</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    placeholder="Name" name="email">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Password</label>
                                                <input type="passwrod" id="userinput1" class="form-control border-primary"
                                                    placeholder="Enter Password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Password Confirmation</label>
                                                <input type="password" id="userinput1" class="form-control border-primary"
                                                    placeholder="Enter Password Confirmation" name="password_confirmation">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Role</label>
                                                <select class="form-control" name="role_id">
                                                    <optgroup label="Select Role">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->role }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                                <label>Select Status</label>
                                                <select class="form-control" name="status">
                                                    <optgroup label="Select Role">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </optgroup>
                                                </select>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  @include('healper.dash.footer')



  <!-- BEGIN VENDOR JS-->
  
  @include('healper.dash.script')
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
</body>
</html>