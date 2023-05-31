@extends('layout.app')
@section('content')

<div class="d-flex justify-content-md-center justify-content-sm-start flex-column  align-items-center  main-container" >
   
    <div class="card text-primary border border-primary shadow-0 m-2" style="width: 280px;">
        <div class="card-body">
          <p class="card-text h5">29, West subramaniya puram , Srirangam , Trichy-6</p>
          <p class="card-text h5"> Quantity : 32 m<sup>3</sup> </p>
        </div>
        <div class="card-footer p-2  border-primary">
            <div class="row">
                <div class="col-6">
                    <p>Status</p>
                </div>
                <div class="col-6 text-danger"><p class="text-end">Pending</p></div>
            </div>
        </div>
      </div>
    <a href="#" type="button" class="btn btn-primary m-4">Add New Order</a>
  </div>
@endsection 