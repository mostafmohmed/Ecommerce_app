<div class="modal fade" id="attributesediteeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.create_faq')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form action=""  class="form update_attr" method="POST">
        @csrf  
        @method('PUT')
        <input type="hidden" name="id" id="id_ed">
          <div class="form-group">
            <label for="name">{{ __('dashboard.question_ar') }}</label>
            <input type="text" name="name[ar]"  class="form-control" id="name_ar_ed"
                placeholder="{{ __('dashboard.question_ar') }}">
                <p></p>
        </div>
        <div class="form-group">
            <label for="name">{{ __('dashboard.question_en') }}</label>
            <input type="text" name="name[en]"   class="form-control" id="name_en_ed"
                placeholder="{{ __('dashboard.question_en') }}">
                <p></p>
        </div>
       
      
        <div class="row attributeValuesContainer">
           
          
           
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary add_more_ed"  id=""><i class="ft-plus"></i></button>
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