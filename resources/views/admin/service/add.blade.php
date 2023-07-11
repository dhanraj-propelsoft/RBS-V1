@extends('admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Service Details</h5>
            <form action="{{ route('ServiceType.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-outline mb-3 ">
                            <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Service Name" required>
                            <label class="form-label" for="serviceName">Service Name <sup class="text-danger">*</sup></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-outline mb-3 ">
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                            <label class="form-label" for="description">Description</label>
                        </div>
                    </div>


                </div>


                <table class="table table-bordered mt-4" id="priceInfo">
                    <thead>
                        <tr>
                            <th scope="col">Effective Date</th>
                            <th scope="col">MRP</th>
                            <th scope="col">Special Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-outline">
                                    <input type="date" class="form-control" name="effectiveDate[]" id="effectiveDate"
                                        placeholder="Effective Date" required>
                                    <label class="form-label" for="effectiveDate" >Effective Date  <sup class="text-danger">*</sup></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-outline">
                                    <input type="number" class="form-control" id="mrp" name="mrp[]" placeholder="MRP" required>
                                    <label class="form-label" for="mrp">MRP  <sup class="text-danger">*</sup></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-outline">
                                    <input type="number" class="form-control" name="specialPrice[]" id="specialPrice"
                                        placeholder="Special Price" required>
                                    <label class="form-label" for="specialPrice">Special Price  <sup class="text-danger">*</sup></label>
                                </div>
                            </td>
                        </tr>
                        <!-- Additional rows can be added dynamically -->
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary mb-3 " type="button" id="addRowBtn">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary me-md-2" type="button">Reset</button>
                    <button class="btn btn-secondary me-md-2" type="button"  onclick="history.back();">Back</button>
                    <button class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#addRowBtn').on('click', function() {
                var table = $('#priceInfo');
                var lastRow = table.find('tbody tr:last');

                // Check if the previous row has values
                if (lastRow.find('#effectiveDate').val() !== '' &&
                    lastRow.find("#mrp").val() !== '') {
                    var newRow = lastRow.clone();
                    // Make the previous row's inputs read-only
                    lastRow.find('input').prop('readonly', true);

                    // Create a new row and append it to the table body

                    newRow.find('input').val('');
                    table.find('tbody').append(newRow);
                } else {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire({
                        //   title: "Error",
                        width: 600,
                        //   background:' #f9e1e5',

                        html: "<div class=' text-danger p-2 rounded mb-2' style='color: #af233a;' ><span class='mx-2'><i class='fa fa-warning text-red'></i> </span><span>You can't add a new row without filling in the previous row.</span></div> "
                    });
                }
            });

            $(".submit-product").click(function() {
                const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire({
                        //   title: "Error",
                        width: 600,
                        //   background:' #f9e1e5',

                        html: "<div class=' p-2 rounded mb-2' style='color: #0d6832;' ><span class='mx-2'><i class='fa fa-thumbs-up '></i> </span><span>Your Product Successfully Added.</span></div> "
                    });
            });
        });
    </script>
@endsection
