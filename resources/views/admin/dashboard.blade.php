@extends('admin.layout.app')
@section('content')
<div class="row col-md-8 m-auto">
  <div  class="date_filters mx-2 col-md-4">
    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-end-0 h-auto rounded-start border-secondary">
        <span class="fa fa-calendar"></span>
      </span>
      <input class="form-control startDate" id="startDateInput" column-number="4" placeholder="Start Date" type="text" value="">
     
    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
  <div  class="date_filters mx-2 col-md-4">
    <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
      <span class="input-group-addon btn btn-floating shadow-0 border border-1 border-end-0 h-auto rounded-start border-secondary">
        <span class="fa fa-calendar"></span>
      </span>
      <input class="form-control endDate" id="endDateInput" column-number="5" placeholder="End Date" type="text" value="">
      
    </div>
    <input type="hidden" id="dtp_input2" value="" />
  </div>
</div>
<div class="d-flex">
    <div class="row position-relative cursor-pointer text-success p-1 shadow-3 m-2 rounded-2 bg-success-light custom-circle w-25" hover="bg-success-light bg-success text-success text-white" >
        <div class="text-center  col-md-6 d-flex justify-content-center align-items-center w-75" fs="1.3rem"> Total order Delivered</div>
        <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-25"  fs="3rem" target_number="{{$deliveredCountings}}">{{$deliveredCountings}}</div>
    </div>
    <div class="row position-relative cursor-pointer text-danger  p-1 shadow-3 m-2 rounded-2 bg-danger-light custom-circle  w-25" hover="bg-danger-light bg-danger text-danger text-white">
      <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-75" fs="1.3rem">Total Order Canceled</div>
      <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-25" fs="3rem" target_number="{{$canceledCountings}}">{{$canceledCountings}}</div>
  </div>
  
  <div class="row position-relative cursor-pointer text-orange p-1 shadow-3 m-2 rounded-2 bg-orange-light custom-circle w-25 " hover="bg-orange-light bg-orange text-orange text-white">
    <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-75" fs="1.3rem">Confirmed Order yet to Deliver</div>
    <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-25" fs="3rem" target_number="{{$confirmedCountings}}">{{$confirmedCountings}}</div>
</div>

<div class="row position-relative cursor-pointer text-yellow p-1 shadow-3 m-2 rounded-2 bg-yellow-light custom-circle w-25" hover="bg-yellow-light bg-yellow text-yellow text-white">
  <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-75" fs="1.3rem">Order Need Admin Confirmation</div>
  <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-25" fs="3rem" target_number="{{$adminConfirmationCountings}}">{{$adminConfirmationCountings}}</div>
</div>

<div class="row position-relative cursor-pointer text-primary p-1 shadow-3 m-2 rounded-2 bg-primary-light custom-circle w-25 " hover="bg-primary-light bg-primary text-primary text-white">
  <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-75" fs="1.3rem">Order Need User Confirmation</div>
  <div class="text-center col-md-6 d-flex justify-content-center align-items-center w-25" fs="3rem" target_number="{{$userConfirmationCountings}}">{{$userConfirmationCountings}}</div>
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
            <td> 
              <span class="badge badge-orange">Order Need Admin Confirmation</span>
      </td>
          </tr>
         
        </tbody>  
      </table>
      
</div>

<!--
                follow the below Method For Status

<span class="badge badge-danger">Canceled</span>
<span class="badge badge-orange">Order Need Admin Confirmation</span>
<span class="badge badge-primary">Order Need User Confirmation</span>
<span class="badge badge-orange">Confirmed</span>
<span class="badge badge-success">Delivered</span>

-->
@endsection