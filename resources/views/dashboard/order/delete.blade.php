<div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form action="{{route('dashpoard.orders.delete')}}" id="updateecoupon" class="form" method="POST">
        @csrf  
      
        <input  id="order_id" type="hidden" name="id">
        
       
      
       
   
     


        </div>
         
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
       
    </form>
      </div>
    </div>
  </div>