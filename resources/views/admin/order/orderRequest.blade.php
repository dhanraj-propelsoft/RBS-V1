@extends('admin.layout.app')
@section('content')

<form class="d-flex justify-content-between" onsubmit="return false">
  <div class="dataTables_length " id="orderTable_length">
    <label>
      <select name="orderTable_length" id="setLengthButton" aria-controls="orderTable" class="form-control select2" style="width:100px;">
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

    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
  <div  class="date_filters mx-2">
    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-end-0 h-auto rounded-start border-secondary">
        <span class="fa fa-calendar"></span>
      </span>
      <input class="form-control endDate" id="endDateInput" column-number="5" placeholder="End Date" type="text" value="">

    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
  <div class="searchByColumn" >
    <label class="input-group">
      <select  name="" id="" class="form-control select2" style="width:200px">
        <option selected disabled> Concrete Grade... </option>
        <option value="1">Grade 3</option>
        <option value="2">Grade 4</option>
      </select>
    </label>
  </div>
  <div class="searchByColumn" >
    <select  name="" id="" class="form-control select2" style="width:150px">
      <option selected disabled> Status... </option>
      <option value="1">Pending</option>
      <option value="2">Confirmed</option>
    </select>
  </div>
  <div class="form_submit">
    <button type="reset" class="btn btn-secondary mx-2"> <i class="fa fa-undo"></i>
    </button>
    <button type="button" class="btn btn-primary"> Submit </button>
  </div>
</form>
<table id="orderTable" class="display">
    <thead >
        <tr>
            <th>#</th>
            <th>Customer Name & Phone Number</th>
            <th>Site Address</th>
            <th>Status</th>
            <th>Order By</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>

    <tr>
      <td>1</td>
      <td class="search-concrete">UUnhlV0fP9</td>
      <td>Product 1</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>01/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>2</td>
      <td class="search-concrete">qWzTlAhnIc</td>
      <td>Product 2</td>
      <td><span class="badge rounded-pill badge-success">Confirm</span></td>
      <td>02/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>3</td>
      <td class="search-concrete">XW1NA4qaGW</td>
      <td>Product 3</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>03/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>4</td>
      <td class="search-concrete">A5Ggsx6ErN</td>
      <td>Product 4</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>04/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>5</td>
      <td class="search-concrete">vzYwAZJHWn</td>
      <td>Product 5</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>05/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>6</td>
      <td class="search-concrete">XBRF5nAYVI</td>
      <td>Product 6</td>
      <td><span class="badge rounded-pill badge-success">Confirm</span></td>
      <td>06/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>7</td>
      <td class="search-concrete">q3h7UzNmuf</td>
      <td>Product 7</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>07/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>8</td>
      <td class="search-concrete">LBFi8xJ1ni</td>
      <td>Product 8</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>08/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>9</td>
      <td class="search-concrete">xj3ephYhXU</td>
      <td>Product 9</td>
      <td><span class="badge rounded-pill badge-success">Confirm</span></td>
      <td>09/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>10</td>
      <td class="search-concrete">AjA5cTZyRu</td>
      <td>Product 10</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>10/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>11</td>
      <td class="search-concrete">a8Thw1XsRm</td>
      <td>Product 11</td>
      <td><span class="badge rounded-pill badge-success">Confirm</span></td>
      <td>11/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

          <tr>
      <td>12</td>
      <td class="search-concrete">5vUPHyKkfy</td>
      <td>Product 12</td>
      <td><span class="badge rounded-pill badge-warning">Pending</span></td>
      <td>12/05/2023</td>
              <td>
      <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#view" onclick="viewRow(this)">
        <i class="fa fa-eye"></i>
      </button>
      <button class="btn btn-success btn-sm" onclick="editRow(this)">
        <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
        <i class="fa fa-trash-o"></i>
      </button>
    </td>


  </tr>

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
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
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
      <div class="modal-footer">
        <div class="dropdown">
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
        <button type="button" class="btn btn-info text-capitalize">Copy URL</button>
        <button type="button" class="btn text-white text-capitalize"  style="background-color: #ac2bac;">Send SMS</button>

      </div>
    </div>
  </div>
</div>
    <script>

 $(document).ready(function() {

  var table = $('#orderTable').DataTable({
  searching: false,
  "scrollY": "calc(100vh - 230px)",
  "scrollX":true,
  responsive: true,
  lengthChange: false,

});


$('#setLengthButton').on('change', function() {
      table.page.len($(this).val()).draw();
    });




$(document).on('click' , ".remove-date",function(){
  // alert("ok");
  $(this).prev().val("");
});

});

$(".navbar .container-fluid").append("<a href='{{ route('order.addNewOrder') }}' class='btn btn-primary btn-sm'>Add Order</a>");

    </script>
@endsection