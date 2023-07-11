@extends('admin.layout.app')
@section('content')

<div class="d-flex justify-content-between">
  <div class="dataTables_length" id="orderTable_length">
    <label>
      <select name="orderTable_length" id="setLengthButton" aria-controls="orderTable" class="select2" style="width:60px;">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
    </label>
  </div>
  <div  class="date_filters mx-2">
    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-end-0 h-auto rounded-start border-secondary">
        <span class="fa fa-calendar"></span>
      </span>
      <input class="form-control startDate" id="startDateInput" column-number="4" placeholder="Start Date" type="text" value="">
      <span class="input-group-addon remove-date btn btn-floating shadow-0 border border-1 border-start-0 h-auto rounded-end border-secondary">
        <span class="fa fa-remove"></span>
      </span>
    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
  <div  class="date_filters mx-2">
    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-end-0 h-auto rounded-start border-secondary">
        <span class="fa fa-calendar"></span>
      </span>
      <input class="form-control endDate" id="endDateInput" column-number="5" placeholder="End Date" type="text" value="">
      <span class="input-group-addon btn remove-date btn-floating shadow-0 border border-1 border-start-0 h-auto rounded-end border-secondary">
        <span class="fa fa-remove"></span>
      </span>
    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
  <div class="searchByColumn" >
    <label class="input-group">
      <input type="text" class="form-control" id="searchByColumn" placeholder="Search by Concrete Grade">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-start-0 h-auto rounded-end border-secondary">
        <span class="fa fa-search"></span>
      </span>
    </label>
  </div>
</div>
<table id="orderTable" class="display">
    <thead >
        <tr>
            <th>#</th>
            <th>Customer Name & Phone Number</th>
            <th>Site Address</th>
            <th>Status</th>
            <th>Order By</th>
        
           
        </tr>
    </thead>
    <tbody>
      @php
      $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', '2023-05-01');
      $endDate = $startDate->copy()->addDays(49); // Increment by 49 days for fifty rows
  
      $currentDate = $startDate;
  @endphp
  
  @for ($i = 1; $i <= 50; $i++)
      <tr  data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
          <td>{{ $i }}</td>
          <td class="search-concrete">{{ Str::random(10) }}</td>
          <td>Product {{ $i }}</td>
          <td>{{ rand(1, 10) }}</td>
          <td>{{ $startDate->format('d/m/Y') }}</td>
        

       
      </tr>
  
      @php
          $currentDate = $currentDate->addDay();
      @endphp
  @endfor
  
  
      </tbody>
      
</table>
<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Customer | <i class="fa fa-phone"></i> <a href="tel:7098432343">7098432343</a></h5>
        <button type="button" class="btn-close outside-modal shadow" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <h5 class="col-md-6">Date:</h5>
          <p class="col-md-6" data-from="date"></p>
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
          <h5 class="col-md-6">Advance:</h5>
          <p class="col-md-6" data-from="advance"></p>
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
        <div class="row">
          <h5 class="col-md-6">Status:</h5>
          <p class="col-md-6" data-from="status"></p>
        </div>
      
        

      </div>
      
  </div>
</div>
    <script>
  
 $(document).ready(function() {
 
  var table = $('#orderTable').DataTable({
    searching: false,
      "scrollY": "calc(100vh - 230px)",
      "scrollX": true,
      responsive: true,
      lengthChange: false,
  initComplete: function () {
    $('#setLengthButton').on('change', function() {
      table.page.len($(this).val()).draw();
    });
  
 $("#searchByColumn").on("keyup", function() {
     console.log($(this).val());
     table.columns( '.search-concrete' )
    .search( 'Important' )
    .draw();
  });
  }
});







$(document).on('click' , ".remove-date",function(){
  // alert("ok");
  $(this).prev().val("");
});

});

$(".navbar .container-fluid").append("<a href='/order/addNewOrder' class='btn btn-primary btn-sm'>Add Order</a>");
   
    </script>
@endsection