@extends('admin.layout.app')
@section('content')


<table class="table" id="productTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Product Name</th>
        <th scope="col">Rate / m</th>
        <th scope="col">MRP</th>
        <th scope="col">Special Price</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Table rows will be added dynamically with data from your backend -->
      <tr>
        <th scope="row">1</th>
        <td>2023-06-07</td>
        <td>Product A</td>
        <td>10.00</td>
        <td>15.00</td>
        <td>12.00</td>
        <td>Active</td>
        <td>
          <!-- Action buttons here -->
          <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
          <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
        </td>
      </tr>
      <!-- Add more rows as needed -->
    </tbody>
  </table>
  
    <script>
  
 $(document).ready(function() {
 
  var table = $('#productTable').DataTable();







$(document).on('click' , ".remove-date",function(){
  // alert("ok");
  $(this).prev().val("");
});

});

$(".navbar .container-fluid").append("<a href='/product/add' class='btn btn-primary btn-sm'>Add Product</a>");
   
    </script>
@endsection