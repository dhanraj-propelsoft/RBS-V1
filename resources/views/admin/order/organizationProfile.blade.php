@extends('admin.layout.app')
@section('content')

<div class="d-flex justify-content-center align-items-sm-start align-items-md-center  ">

  <div class="card col-10 " style="height:100%;">
    <div class="card-header border-0">
      <h5 class="card-title float-start">Profile</h5>
      <div class="float-end">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>

    </div>
    <div class="card-body">
      <form action="{{url('agentStore')}}"  method="post" >
        @csrf
        <input type="hidden" name="userType" id="userType" value="{{$userType}}" />
        <input type="hidden" name="link"  value="admin" />
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="organizationName" name="organizationName" class="form-control" required/>
              <label class="form-label" for="organizationName">Organization/Builder/Agent Name<sup class="text-red">*</sup> </label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="email" id="organizationEmail" name="organizationEmail" class="form-control" />
              <label class="form-label" for="organizationEmail">Organization Email</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="gst" pattern="[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}" name="gst" class="form-control" />
              <label class="form-label" for="gst">GST</label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="addressLine1" name="addressLine1" class="form-control" required />
              <label class="form-label" for="addressLine1">Address Line 1<sup class="text-red">*</sup></label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="addressLine2" name="addressLine2" class="form-control" required/>
              <label class="form-label" for="addressLine2">Address Line 2<sup class="text-red">*</sup> </label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="city" name="city" class="form-control" />
              <label class="form-label" for="city">City </label>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="contactPerson" name="personName" class="form-control" required/>
              <label class="form-label" for="contactPerson">Contact Person<sup class="text-red">*</sup> </label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="personDesignation" name="personDesignation" class="form-control" />
              <label class="form-label" for="personDesignation">Contact Person Designation</label>
            </div>
          </div>

        </div>



        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="mobileNumber" name="mobileNumber"  class="form-control" pattern="[0-9]{10,10}" value="{{$mobile}}" maxlength="10" readonly/>
              <label class="form-label" for="mobileNumber">Mobile Number</label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="email" id="personEmail" name="personEmail" class="form-control" />
              <label class="form-label" for="personEmail">Person Email</label>
            </div>
          </div>
        </div>
        <div class="float-end  mb-4">
          <div class="d-grid gap-2 ">
            <button class="btn btn-primary">Continue</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection