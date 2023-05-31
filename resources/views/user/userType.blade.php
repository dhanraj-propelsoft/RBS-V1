@extends('layout.app')
@section('content')

<div class="d-flex justify-content-center align-items-center p-2 main-container">
  <div class="card col-12 col-sm-12 col-md-6 col-lg-4">
    <div class="card-header border-0">
      <h5 class="card-title float-start">Confirmation</h5>
      <div class="float-end">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>

    </div>
    <div class="card-body">
      <form name="form" method="post" action="{{url('setUserType')}}">
        @csrf
        <input type="hidden" name="mobileNo" id="mobileNo" required value="{{$mobileNo}}" />
        <div class="form-check mb-4">
          <input class="form-check-input" type="radio" name="userConfirm" id="Engineer" required value="1" />
          <label class="form-check-label" for="Engineer">Engineer/Builder/Agent</label>
        </div>


        <div class="form-check">
          <input class="form-check-input" type="radio" name="userConfirm" id="customer" required value="2" />
          <label class="form-check-label" for="customer">Party/Direct Customer</label>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-4 ">
          <button class="btn btn-primary">Continue</button>

        </div>

      </form>

    </div>
  </div>
</div>


@endsection