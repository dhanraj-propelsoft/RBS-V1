@extends('layout.app')
@section('content')

<div class="d-flex justify-content-center align-items-sm-start align-items-md-center  main-container" >
   
    <div class="card col-11 col-sm-11 mt-2 col-md-8 col-lg-6"  style="height:100%;">
      <div class="card-header border-0">
        <h5 class="card-title float-start">Profile</h5>
        <div class="float-end">
            <button type="button" class="btn-close"  aria-label="Close"></button>
        </div>

      </div>    
      <div class="card-body">
        <form action="" method="post">
         <!-- 2 column grid layout with text inputs for the first and last names -->
         <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="organizationName" class="form-control" required/>
                <label class="form-label" for="organizationName">Organization/Builder/Agent Name<sup class="text-red">*</sup>  </label>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="email" id="organizationEmail" class="form-control" />
                <label class="form-label" for="organizationEmail">Organization Email</label>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="gst" class="form-control" />
                <label class="form-label" for="gst">GST</label>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="blockPlotNumber" class="form-control" required/>
                <label class="form-label" for="blockPlotNumber">Block/Plot Number<sup class="text-red">*</sup></label>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="street" class="form-control" name="street" required/>
                <label class="form-label" for="street">Street<sup class="text-red">*</sup>  </label>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="contactPerson" class="form-control" required/>
                <label class="form-label" for="contactPerson">Contact Person<sup class="text-red">*</sup>  </label>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="personDesignation" class="form-control" />
                <label class="form-label" for="personDesignation">Person Designation</label>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="mobileNumber" class="form-control" pattern="[0-9]{10,10}" oninput="this.value=this.value.replace(/[^\d]/,'')" required maxlength="10"/>
                <label class="form-label" for="mobileNumber" >Mobile Number</label>
              </div>
            </div>
          </div>
          

          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="email" id="personEmail" class="form-control" />
                <label class="form-label" for="personEmail">Person Email</label>
              </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="d-grid gap-2 ">
                    <button class="btn btn-primary" >Continue</button>
            
                 </div>
            </div>
          </div>
          
  

        </form>

      </div>
    </div>
  </div>


@endsection