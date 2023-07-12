@extends('admin.layout.app')
@section('content')

<form class="d-flex justify-content-between form-for-filter" onsubmit="return false">
  <div class="dataTables_length " id="orderTable_length">
    <label>
      <select name="orderTable_length" id="setLengthButton" aria-controls="orderTable" class="form-control select2" style="width:60px;">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
    </label>
  </div>
  <div class="date_filters mx-2">
    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-end-0 h-auto rounded-start border-secondary">
        <span class="fa fa-calendar"></span>
      </span>
      <input class="form-control startDate" id="startDateInput" column-number="4" placeholder="Start Date" type="text" value="">

    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
  <div class="date_filters mx-2">
    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-end-0 h-auto rounded-start border-secondary">
        <span class="fa fa-calendar"></span>
      </span>
      <input class="form-control endDate" id="endDateInput" column-number="5" placeholder="End Date" type="text" value="">

    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
  <div class="searchByColumn">
    <label class="input-group">
      <select name="" id="" class="form-control select2" data-placeholder="Search by Concrete Grade" multiple style="width:200px">
  
        <option value="1">Grade 3</option>
        <option value="2">Grade 4</option>
      </select>
    </label>
  </div>
  <div class="searchByColumn">
    <select name="" id="" class="form-control select2" multiple data-placeholder="Search by Status" style="width:150px">
      
      <option value="1">Pending</option>
      <option value="2">Confirmed</option>
    </select>
  </div>
  <div class="form_submit">
    <button type="reset" class="btn btn-secondary mx-2 reset-form"> <i class="fa fa-undo"></i>
    </button>
    <button type="button" class="btn btn-primary"> Submit </button>
  </div>
</form>
<table id="orderTable" class="display">
  <thead>
    <tr>
      <th>#</th>
      <th>Date & Time of Supply</th>
      <th>Customer Name & Phone Number</th>
      <th>Site Address</th>
      <th>Status</th>
      <th>Order By</th>
     </tr>
  </thead>
  <tbody>
 
    @foreach($modelDatas as $modelData)
    <tr class="cursor-pointer" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
      <td>{{$loop->iteration}}</td>
      <td>Need Date Here</td>
      <td class="search-concrete">{{$modelData['customerData']}}</td>
      <td>{{$modelData['siteAddress']}}</td>
      <td><span class="badge rounded-pill badge-orange">{{$modelData['status']}}</span></td>
      <td>{{$modelData['orderBy']}}</td>

    </tr>
    @endforeach
  </tbody>

</table>
<!-- Modal -->
<div class="modal fade " id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Customer | <i class="fa fa-phone"></i> <a href="tel:7098432343">7098432343</a></h5>
        <div class="d-flex">
          <button class="btn btn-success mx-2">Edit</button>
          <button type="button" class="btn btn-info text-capitalize me-2">Copy URL</button>
          <button type="button" class="btn text-white text-capitalize shadow  me-2" style="background-color: #ac2bac;">Send SMS</button>
          <button type="button" class="btn-close outside-modal shadow"  data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>

      </div>
      <div class="modal-body">
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
          <h5 class="col-md-6">Total Amount:</h5>
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
          <h5 class="col-md-6">Site Name & Address:</h5>
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
          <h5 class="col-md-6">Current Status:</h5>
          <p class="col-md-6" data-from="status"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger text-capitalize">Cancel Order</button>
        <button type="button" class="btn btn-success text-capitalize"> Order Delivered</button>
        <button type="button" class="btn text-white  text-capitalize" style="background-color: rgb(236, 74, 137);"> Confirm Party Order Over Phone</button>
        <button type="button" class="btn btn-orange text-capitalize"> Confirm Order</button>
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

    });


    $('#setLengthButton').on('change', function() {
      table.page.len($(this).val()).draw();
    });




    $(document).on('click', ".remove-date", function() {
      // alert("ok");
      $(this).prev().val("");
    });

  });

  $(".navbar .container-fluid").append("<a href='{{ route('order.addNewOrder') }}' class='btn btn-primary btn-sm'>Add Order</a>");

  $(".reset-form").click(function() {
   
    $(".form-for-filter .select2[multiple]").val("").trigger("change");
});

</script>
@endsection