@extends('layout.app')
@section('content')
  <!-- Sticky Footer -->
  <footer class="fixed-bottom">
    <div class="container d-flex justify-content-center py-3">
      <button type="button" class="btn btn-primary text-capitalize" data-mdb-toggle="modal" data-mdb-target="#myModal">Order Create</button>
    </div>
  </footer>

  <!-- Modal -->
  <div class="modal" id="myModal" tabindex="-1" role="dialog"  data-mdb-backdrop="static"
  data-mdb-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header p-2 border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="form" method="post" action="{{url('findByMobileNumber')}}">
          @csrf
            <div class="col">
              <div class="form-outline">
                <input type="number" id="phoneNumber" name="phoneNumber" class="form-control form-control-lg"  pattern="[0-9]{10,10}" required maxlength="10" oninput="this.value=this.value.replace(/[^\d]/,'')" placeholder="Enter Your Mobile Number" />
                <label class="form-label" for="phoneNumber">Mobile Number</label>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary mt-2" >Continue</button>

            </div>
          </form>
        </div>

          
  
      </div>
    </div>
  </div>


@endsection 