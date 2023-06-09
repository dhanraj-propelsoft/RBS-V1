@extends('admin.layout.app')
@section('content')


<table class="table" id="serviceTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>Service Name</th>
        <th>Price</th>
        <th>Special Price</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>2023-06-01</td>
        <td>Service A</td>
        <td>$50</td>
        <td>$45</td>
        <td><button type="button" class="btn btn-sm btn-success">Active</button></td>
        <td><button type="button" class="btn btn-sm btn-success mx-2"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></td>
      </tr>
      <tr>
        <td>2</td>
        <td>2023-06-02</td>
        <td>Service B</td>
        <td>$70</td>
        <td>$60</td>
        <td><button type="button" class="btn btn-sm btn-danger">Inactive</button></td>
        <td><button type="button" class="btn btn-sm btn-success mx-2"><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></td>
      </tr>
     
    </tbody>
  </table>
  
  

    <script>
  
 $(document).ready(function() {
 
  var table = $('#serviceTable').DataTable();







$(document).on('click' , ".remove-date",function(){
  // alert("ok");
  $(this).prev().val("");
});

});

$(".navbar .container-fluid").append("<a href='/service/add' class='btn btn-primary btn-sm'>Add Service</a>");
   
    </script>
@endsection