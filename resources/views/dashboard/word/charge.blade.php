<div class="modal fade" id="change_price_{{ $Gov->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.shipping_price') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- apper validations errors --}}
        <div class="alert alert-danger" style="display: none" id="errors_{{ $Gov->id }}"></div>

        <form action="" method="POST" class="update_shipping_price" gov-id={{ $Gov->id }}>
            @csrf
            @method('PUT')
        <div class="modal-body">
            <p>{{ __('dashboard.select_shipping_price') }}</p>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">{{ __('dashboard.shipping_price') }}</label>
                        <input type="number" name="price" class="form-control" value="{{ $Gov->shippingPrice->price }}" >
                        <input type="hidden" name="gov_id" class="form-control" value="{{ $Gov->id }}" >
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('dashboard.close') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
        </div>
    </form>

      </div>
    </div>
  </div>