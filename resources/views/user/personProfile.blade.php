@extends('layout.app')
@section('content')

<div class="d-flex justify-content-center align-items-sm-start align-items-md-center  main-container">

  <div class="card col-6 col-sm-11 mt-2 col-md-6 col-lg-6" style="height:100%;">
    <div class="card-header border-0">
      <h5 class="card-title float-start">Profile</h5>
      <div class="float-end">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>

    </div>
    <div class="card-body">
      <form name="form" method="post" action="{{url('storeUserCredential')}}">
        @csrf
        <input type="hidden" name="userType" id="userType" required value="{{$userType}}" />
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="organizationName" name="organizationName" class="form-control " required />
              <label class="form-label" for="organizationName"> Name<sup class="text-red">*</sup> </label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="gst" name="gst" class="form-control" />
              <label class="form-label" for="gst">GST</label>
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="mobileNumber" name="mobileNumber" value="{{$mobileNo}}" class="form-control" required pattern="[0-9]{10,10}" oninput="this.value=this.value.replace(/[^\d]/,'')" required maxlength="10" />
              <label class="form-label" for="mobileNumber">Mobile Number<sup class="text-red">*</sup></label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="email" id="email" name="email" class="form-control"  />
              <label class="form-label" for="email">Email</label>
            </div>
          </div>
        </div>
        
        <div class="row">
         
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="plotNUmber" name="plotNUmber" class="form-control"  />
              <label class="form-label" for="plotNUmber">Block/Plot Number </label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="streetCityState" name="streetCityState" class="form-control"  />
              <label class="form-label" for="streetCityState">Street, City, State </label>
            </div>
          </div>
        </div>
        
        <div class="row">
         
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="text" id="city" name="city" class="form-control"  />
              <label class="form-label" for="city">City </label>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="d-grid gap-2">
              <button class="btn btn-primary">Continue</button>
            </div>
          </div>
        </div>
        
       
    



      </form>

    </div>
  </div>
</div>


@endsection