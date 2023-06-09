@extends('layout.app')
@section('content')

<div class="d-flex justify-content-center align-items-start mt-5 shadow-1  main-container">

  <div class="card col-10" >
    <div class="card-header border-0">
      <h5 class="card-title float-start">Profile</h5>
      <div class="float-end">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>

    </div>
    <div class="card-body">
      <form name="form" method="post" action="{{url('personStore')}}">
        @csrf
        <input type="hidden" name="userType" id="userType" value="{{$userType}}" />
        <!-- <input type="hidden" name="link"  value="admin" /> -->
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="personName" name="personName" class="form-control " required />
              <label class="form-label" for="personName"> Name<sup class="text-red">*</sup> </label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="mobileNumber" value="{{$mobileNo}}" name="mobileNumber" value="" class="form-control" required pattern="[0-9]{10,10}" oninput="this.value=this.value.replace(/[^\d]/,'')" readOnly  maxlength="10" />
              <label class="form-label" for="mobileNumber">Mobile Number<sup class="text-red">*</sup></label>
            </div>
          </div>
        </div>

        <div class="row">


          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="email" id="email" name="personEmail" class="form-control" />
              <label class="form-label" for="email">Email</label>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="addressLine1" name="addressLine1" class="form-control" />
              <label class="form-label" for="addressLine1">Address Line 1 </label>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="addressLine2" name="addressLine2" class="form-control" />
              <label class="form-label" for="addressLine2">Address Line 1</label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="city" name="city" class="form-control" />
              <label class="form-label" for="city">City </label>
            </div>
          </div>
        </div>
          <div class="col-md-6  mx-auto mb-4">
            <div class="d-grid gap-2">
              <button class="btn btn-primary">Continue</button>
            </div>
          </div>
      </form>

    </div>
  </div>
</div>


@endsection