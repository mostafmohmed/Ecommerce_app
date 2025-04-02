<div class="modal fade" id="faqEditModal_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.create_faq')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form action="" id="" class="form updateFqs" method="POST">
        @csrf  
        @method('PUT')
        <input type="hidden" id="fqe_id">
          <div class="form-group">
            <label for="name">{{ __('dashboard.question_ar') }}</label>
            <input type="text" name="question[ar]" id="questione_ar" class="form-control" id="name"
                placeholder="{{ __('dashboard.question_ar') }}">
                <p></p>
        </div>
        <div class="form-group">
            <label for="name">{{ __('dashboard.question_en') }}</label>
            <input type="text" name="question[en]" id="questione_en" class="form-control" id="name"
                placeholder="{{ __('dashboard.question_en') }}">
                <p></p>
        </div>
        <div class="form-group">
            <label for="name">{{ __('dashboard.answer') }}</label>
            <input type="text" name="answer[ar]" id="answere_ar"  class="form-control" id="name"
                placeholder="{{ __('dashboard.answer_ar') }}">
                <p></p>
        </div>
        <div class="form-group">
            <label for="name">{{ __('dashboard.answer') }}</label>
            <input type="text" name="answer[en]" id="answere_en"  class="form-control" id="name"
                placeholder="{{ __('dashboard.answer_en') }}">
                <p></p>
        </div>
        
      
        
        
      
        <div class="input-group">
        </div>    
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>