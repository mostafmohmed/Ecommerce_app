<div class="modal fade" id="attributescreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.create_faq')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form action="" id="createattrubute" class="form" method="POST">
        @csrf  
          <div class="form-group">
            <label for="name">{{ __('dashboard.question_ar') }}</label>
            <input type="text" name="name[ar]" id="question_ar" class="form-control" id="name"
                placeholder="{{ __('dashboard.question_ar') }}">
                <p></p>
        </div>
        <div class="form-group">
            <label for="name">{{ __('dashboard.question_en') }}</label>
            <input type="text" name="name[en]"  id="question_en" class="form-control" id="name"
                placeholder="{{ __('dashboard.question_en') }}">
                <p></p>
        </div>
       
      
        <div class="row attribute_values_row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">{{ __('dashboard.attribute_value_ar') }}</label>
                    <input type="text" name="value[1][ar]" class="form-control" id="code"
                        placeholder="{{ __('dashboard.attribute_value_ar') }}">
                    <strong class="text-danger" id="error_code"></strong>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">{{ __('dashboard.attribute_value_en') }}</label>
                    <input type="text" name="value[1][en]" class="form-control" id="code"
                        placeholder="{{ __('dashboard.attribute_value_en') }}">
                    <strong class="text-danger" id="error_code"></strong>
                </div>
            </div>
            <div class="col-md-2 mt-2">
                <button disabled type="button" class="btn btn-danger remove"><i class="ft-x"></i></button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary add_more"  id=""><i class="ft-plus"></i></button>
            </div>
        </div><br>
      
        
        
      
       
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>