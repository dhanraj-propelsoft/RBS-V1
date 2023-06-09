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
<script>
  $(function () {
    $(".order_confirm").click(function(){

			swal.fire({
		    confirmButton:false,
        html:""

			})
		});
  });
</script>
@endsection