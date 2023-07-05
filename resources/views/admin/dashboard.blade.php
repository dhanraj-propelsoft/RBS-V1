@extends('admin.layout.app')
@section('content')
<div class="d-flex flex-wrap justify-content-center p-1">
    <div class="card  p-1 shadow-3 m-2 rounded-2" style="width:350px;border-left:6px solid #14a44d">
        <h4 class="text-center text-success " > Delivered</h4>
        <h3 class="text-center text-success " target_number="350">350</h3>
    </div>
    <div class="card  p-1 shadow-3 m-2 rounded-2" style="width:350px;border-left:6px solid #dc4c64">
        <h4 class="text-center text-danger " >Canceled</h4>
        <h3 class="text-center text-danger " target_number="50">50</h3>
    </div>
    <div class="card  p-1 shadow-3 m-2 rounded-2" style="width:350px;border-left:6px solid #e4a11b">
        <h4 class="text-center text-warning " >Confirmed</h4>
        <h3 class="text-center text-warning " target_number="30">30</h3>
    </div>
    <div class="card  p-1 shadow-3 m-2 rounded-2" style="width:350px;border-left:6px solid #6500fd">
        <h4 class="text-center text-violet ">Need Admin Confirmation</h4>
        <h3 class="text-center text-violet " target_number="35">35</h3>
    </div>
    <div class="card  p-1 shadow-3 m-2 rounded-2" style="width:350px;border-left:6px solid #1a8de4">
        <h4 class="text-center text-primary ">Need User Confirmation</h4>
        <h3 class="text-center text-primary " target_number="{{$userConfirmationCountings}}">{{$userConfirmationCountings}}</h3>
    </div>
</div>
<div class="p-2 mt-5">
   
      <table class="table mt-3 shadow-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date & Time of Supply</th>
            <th scope="col">Customer Name &amp; Phone Number</th>
            <th scope="col">Site Address</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>2023-06-01 09:00 AM</td>
            <td>John Doe - (123) 456-7890</td>
            <td>123 Main St, City</td>
            <td>Pending</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>2023-06-02 10:30 AM</td>
            <td>Jane Smith - (987) 654-3210</td>
            <td>456 Elm St, City</td>
            <td>Completed</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>2023-06-03 11:45 AM</td>
            <td>Michael Johnson - (555) 123-4567</td>
            <td>789 Oak St, City</td>
            <td>Pending</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>2023-06-04 02:15 PM</td>
            <td>Sarah Williams - (111) 222-3333</td>
            <td>321 Pine St, City</td>
            <td>Completed</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>2023-06-05 03:30 PM</td>
            <td>Robert Brown - (444) 555-6666</td>
            <td>654 Cedar St, City</td>
            <td>Pending</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>2023-06-06 04:45 PM</td>
            <td>Amy Davis - (777) 888-9999</td>
            <td>987 Maple St, City</td>
            <td>Completed</td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>2023-06-07 06:00 PM</td>
            <td>David Wilson - (222) 333-4444</td>
            <td>159 Oak St, City</td>
            <td>Pending</td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>2023-06-08 07:30 PM</td>
            <td>Lisa Anderson - (666) 777-8888</td>
            <td>357 Pine St, City</td>
            <td>Completed</td>
          </tr>
          <tr>
            <th scope="row">9</th>
            <td>2023-06-09 09:15 PM</td>
            <td>Chris Turner - (999) 000-1111</td>
            <td>753 Cedar St, City</td>
            <td>Pending</td>
          </tr>
          <tr>
            <th scope="row">10</th>
            <td>2023-06-10 10:45 PM</td>
            <td>Jessica Martinez - (333) 444-5555</td>
            <td>159 Maple St, City</td>
            <td>Completed</td>
          </tr>
        </tbody>
      </table>
      
</div>

@endsection