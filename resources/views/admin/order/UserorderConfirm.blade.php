@extends('admin.layout.app')
@section('content')
<div class="card col-10 m-auto p-3  order-confirm">
    <div class="card-header d-flex align-items-center">		
        <h5 class="text-center w-100">Order Details</h5>
        <div style="width:80px;">
          <button type="button" class="border-0 bg-white revert-order-details">
              <i class="fa fa-edit ml-2" ></i>
              </button>			
          <button type="button" class="btn-close"  aria-label="Close"></button>
      </div>  
        
          
      </div>
      <div class="card-body">
     
  
        <div class="row">
          <h5 class="col-md-6">Date:</h5>
          <p class="col-md-6" data-from="datetime"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Customer Name:</h5>
          <p class="col-md-6" data-from="customerName"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Site Name:</h5>
          <p class="col-md-6" data-from="siteName"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Engineer Name:</h5>
          <p class="col-md-6" data-from="engineerName"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Engineer Number:</h5>
          <p class="col-md-6" data-from="engineerNumber"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Concrete Grade:</h5>
          <p class="col-md-6" data-from="conGrade"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Quantity:</h5>
          <p class="col-md-6" data-from="quantity"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Date & Time of Supply:</h5>
          <p class="col-md-6" data-from="datetime"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Remarks:</h5>
          <p class="col-md-6" data-from="remarks"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Service:</h5>
          <p class="col-md-6" data-from="service"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Price:</h5>
          <p class="col-md-6" data-from="price"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Site Address:</h5>
          <p class="col-md-6" data-from="siteAddresses"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Land Mark:</h5>
          <p class="col-md-6" data-from="landmark"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Billing Address:</h5>
          <p class="col-md-6" data-from="billAddresses"></p>
        </div>
        
      <div class="d-flex justify-content-center">
        <a href="#" class="btn btn-primary  col-6 m-auto order_confirm" >Order Confirm</a>

      </div>
      </div>
      </div>
</div>

<!-- Modal -->
<div class="modal fade" id="orderConfirmModal" tabindex="-1" aria-labelledby="orderConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderConfirmModalLabel">Order Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <div class="border-bottom pb-2 d-flex justify-content-between">
      <span class=" btn-link  text-primary">http://127.0.0.1:8000/order/userOrderConfirm</span>
      <button type="button" class="btn mx-3 btn-primary btn-sm ">Copy Link</button>
    </div>
        
    
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Confirm Order</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    $(".order_confirm").click(function(){
      $("#orderConfirmModal").modal("show");
		console.log("worked");
		});
  });
</script>
@endsection