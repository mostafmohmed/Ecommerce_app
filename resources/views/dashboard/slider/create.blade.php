<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form action="" id="createslider" class="form" method="POST" enctype="multipart/form-data">
        @csrf  
          <div class="form-group">
            <label for="name">{{ __('dashboard.code') }}</label>
            <input type="text" name="notes.en" id="notes_en" class="form-control" id="notes"
                placeholder="{{ __('dashboard.code') }}">
                <p></p>
        </div>
        <div class="form-group">
            <label for="name">{{ __('dashboard.code') }}</label>
            <input type="text" name="notes.ar" id="notes_ar" class="form-control" id="notes"
                placeholder="{{ __('dashboard.code') }}">
                <p></p>
        </div>
        {{-- <div class="form-group">
            <label for="name">{{ __('dashboard.discount_perecentage') }}</label>
            <input type="text" name="discount_perecentage" class="form-control" id="discount_perecentage"
                placeholder="{{ __('dashboard.discount_perecentage') }}">
                <p></p>
        </div>
        <div class="form-group">
            <label for="limit">{{ __('dashboard.limitation') }}</label>
            <input type="number" id="limit" name="limit" class="form-control" id="single-image"
                placeholder="{{ __('dashboard.limitation') }}">
                <p></p>
        </div> --}}
        <div class="form-group">
            <label for="limit">{{ __('dashboard.start_date') }}</label>
            <input type="file" name="file_name" class="form-control" id="file_name"
              >
                <p></p>
        </div>

        {{-- <div class="form-group">
            <label for="limit">{{ __('dashboard.end_date') }}</label>
            <input type="date" name="end_data" class="form-control" id="end_data"
                placeholder="{{ __('dashboard.end_date') }}">
                <p></p>
        </div> --}}
     
        {{-- <div class="form-group">
            <label >{{ __('dashboard.status') }}</label>
            <div class="input-group">
            <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" value="1" id="is_active" name="is_active" class="custom-control-input"
                    >
                    <p></p>
                <label class="custom-control-label" for="yes1">{{ __('dashboard.active') }}</label>
            </div>
            <div class="d-inline-block custom-control custom-radio">
                <input type="radio" value="0"  id="is_active" name="is_active" class="custom-control-input"
                    id="no1">
                    <p></p>
                <label class="custom-control-label" for="no1">{{ __('dashboard.inactive') }}</label>
            </div>
        </div>

        </div> --}}
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