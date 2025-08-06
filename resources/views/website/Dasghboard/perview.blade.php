{{-- <div class="tab-pane fade" id="v-pills-review" role="tabpanel"  tabindex="0"> --}}
<div class="top-selling-section">
<div class="row g-5">
@foreach ($perview as $item)
  <div class="col-md-6">
<div class="product-wrapper">
<div class="product-img">
<img src="{{asset('uploads/produect/'. $item->produect->images()->first()->file_name)}}" alt="product-img">
</div>
<div class="product-info">
<div class="review-date">
<p>{{  $item->created_at->diffForHumans()  }}</p>
</div>
<div class="ratings">
<span>
<svg width="75" height="15" viewBox="0 0 75 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" fill="#FFA800" />
<path d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z" fill="#FFA800" />
<path d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z" fill="#FFA800" />
<path d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z" fill="#FFA800" />
<path d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z" fill="#FFA800" />
</svg>
</span>
</div>
<div class="product-description">
<a href="product-sidebar.html" class="product-details"> {{$item->produect->name}}
</a>
<p id="comment-text-{{ $item->id }}">
    {{$item->comment}}
</p>
</div>
</div>
<div class="product-cart-btn">
<button type="button" class="product-btn" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}">
  Edit Review
</button>

</div>
</div>
</div>
   <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">Edit Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="comment-{{ $item->id }}" class="form-label">Comment</label>
            <textarea class="form-control" id="comment-{{ $item->id }}" name="comment" rows="4">{{ $item->comment }}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary save-comment-btn" data-review_id="{{ $item->id }}">Save Changes</button>

        </div>
      </div>

  </div>
</div> 
@endforeach




</div>
</div>
{{-- </div> --}}