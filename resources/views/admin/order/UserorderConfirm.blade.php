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
          <h5 class="col-md-6">Order Id & Requested Date:</h5>
          <p class="col-md-6" data-from="date"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Date & Time of Supply:</h5>
          <p class="col-md-6" data-from="customerName"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Organisation Name & Number :</h5>
          <p class="col-md-6" data-from="siteName"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Engineer Name & Number:</h5>
          <p class="col-md-6" data-from="engineer"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Party Name & Number:</h5>
          <p class="col-md-6" data-from="party"></p>
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
          <h5 class="col-md-6">Service:</h5>
          <p class="col-md-6" data-from="service"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">T otal Amount:</h5>
          <p class="col-md-6" data-from="service"></p>
        </div>
       
        <div class="row">
          <h5 class="col-md-6">Advance:</h5>
          <p class="col-md-6" data-from="advance"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Balance Amount:</h5>
          <p class="col-md-6" data-from="balance"></p>
        </div>
       
 
      
        <div class="row">
          <h5 class="col-md-6">Site Name &  Address:</h5>
          <p class="col-md-6" data-from="siteAddresses"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Land Mark:</h5>
          <p class="col-md-6" data-from="landmark"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Billing Name & Address:</h5>
          <p class="col-md-6" data-from="billAddresses"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Remark:</h5>
          <p class="col-md-6" data-from="remark"></p>
        </div>
        <div class="row">
          <h5 class="col-md-6">Status:</h5>
          <p class="col-md-6" data-from="status"></p>
        </div>
       
        

      </div>
      <div class="card-footer d-flex justify-content-end  gap-3">
        
        <div class="dropdown ">  
          <button
            class="btn btn-warning text-capitalize dropdown-toggle"
            type="button"
            id="dropdownMenuButton"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Pending
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Pending</a></li>
            <li><a class="dropdown-item" href="#">Cancel Order</a></li>
            <li><a class="dropdown-item" href="#">Order Delivered</a></li>
            <li><a class="dropdown-item" href="#">Confirm Order</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-info text-capitalize" data-url="http://127.0.0.1:8000/order/userOrderConfirm" >Copy URL</button>
        <button type="button" class="btn text-white text-capitalize"  style="background-color: #ac2bac;">Send SMS</button>
       
      </div>
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

  $("[data-url]").click(function(){
    var url =$(this).attr("data-url");

// Create a temporary input element
var tempInput = document.createElement('input');
tempInput.value = url;
document.body.appendChild(tempInput);

// Copy the URL from the input element
tempInput.select();
document.execCommand('copy');

// Remove the temporary input element
document.body.removeChild(tempInput);

// Alert or perform any other action after copying the URL
swal.fire('URL copied to clipboard!');
  });  
  

  });
</script>
@endsection