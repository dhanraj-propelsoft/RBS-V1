@extends('admin.layout.app')
@section('content')
    <form class="d-flex col-8 m-auto mb-2 mt-2" action="{{ route('order.createAccount') }}" method="POST">
        @csrf
        <div class="form-outline">
            <input type="text" id="mobileNumberInput" class="form-control" pattern="[0-9]{10,10}"
                oninput="this.value=this.value.replace(/[^\d]/,'')" required maxlength="10"
                placeholder="Enter Customer Mobile Number For Find" name="mobileNumber" />
            <label class="form-label" for="mobileNumberInput">Mobile Number</label>
        </div>

        <button type="button" class="btn btn-primary col-3 mx-2 addNew">Add New </button>
        <!-- Modal -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" data-mdb-backdrop="static"
            data-mdb-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header p-2 border-bottom-0">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Click a Valid One</h5> --}}
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div action="" style="width:200px;" class="m-auto">

                            <div class="form-check mb-4 m-auto">
                                <input class="form-check-input" type="radio" name="userConfirm" id="Engineer" required
                                    value="1" />
                                <label class="form-check-label" for="Engineer">Engineer/Builder/Agent</label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="userConfirm" id="customer" required
                                    value="2" />
                                <label class="form-check-label" for="customer">Party/Direct Customer</label>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-4 ">
                                <button class="btn btn-primary">Continue</button>

                            </div>

                        </div>


                    </div>



                </div>
            </div>
        </div>
    </form>
    <div class="numberTableContainer">
        <table id="numberTable" class="table table-border  table-sm ">
            <thead class="bg-primary text-white">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Organization</th>
                    <th>Designation</th>
                </tr>
            </thead>
            <tbody>
                <!-- Duplicate rows -->
                @foreach ($models as $model)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $model['name'] }}</td>
                        <td>{{ $model['mobile_no'] }}</td>
                        <td>{{ $model['email'] }}</td>
                        @if ($model['organization_name'])
                            <td>{{ $model['organization_name'] }}</td>
                        @else
                            <td>Null</td>
                        @endif
                        <td>Manager</td>
                        <td style="display: none">{{ $model['id'] }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary reset-btn">Reset</button>
            <button type="button" class="btn btn-primary mx-4 next-btn">Next</button>
        </div>
    </div>
    <form id="mobileform" action="{{ route('order.checkPerson') }}" method="post">
        @csrf
        <input type="hidden" name="mobile" id="mobiles">
        <input type="hidden" name="personId" id="personId">

    </form>



    <script>
        $(function() {
            // Get the input element
            var input = $("#mobileNumberInput");

            // Add an event listener to detect changes in the input
            input.on("input", filterTable);
            filterTable();
            // Function to filter the table based on the mobile number input
            function filterTable() {
                if (input.val().toLowerCase().length >= 3) {
                    $(".numberTableContainer").show();
                    // Get the value of the input
                    var filter = input.val().toLowerCase();

                    // Get all the rows of the table body
                    var rows = $("#numberTable tbody tr");

                    // Loop through each row
                    rows.each(function() {
                        var phoneNumber = $(this).find("td:eq(2)").text();

                        // Check if the phone number matches the filter
                        if (phoneNumber.toLowerCase().indexOf(filter) > -1) {
                            $(this).show(); // Show the row

                        } else {
                            $(this).hide(); // Hide the row
                        }
                    });

                    // Check if there are any visible rows
                    var visibleRows = $("#numberTable tbody tr:visible");
                    var addNewBtn = $(".addNew");

                    // Enable or disable the "Add New Order" button based on the number of visible rows
                    if (visibleRows.length > 0) {
                        addNewBtn.prop("disabled", true);
                        $(".next-btn").prop("disabled", false);
                        $(".numberTableContainer").show();
                    } else {
                        addNewBtn.prop("disabled", false);
                        $(".next-btn").prop("disabled", true);
                        $(".numberTableContainer").hide();
                    }

                } else {
                    $(".numberTableContainer").hide();
                }


            }

            /* Modal Open */
            $(".addNew").click(function() {

                if (/[0-9]{10,10}/.test($("#mobileNumberInput").val())) {
                    $('#myModal').modal('show');
                } else {

                    swal.fire("Enter Valid Mobile Number");


                }
            });
            $(".reset-btn").click(function() {
                // alert("ok");
                $("form")[0].reset();
                filterTable();

            });
            $(".next-btn").click(function() {
                var rowCount = $("#numberTable tbody tr:visible").length;

                if (rowCount === 1) {
                    var mobileNumber = $("#numberTable tbody tr:visible td:eq(2)").text();
                    var personId = $("#numberTable tbody tr:visible td:eq(6)").text();
                    if (mobileNumber && personId) {
                        $('#mobiles').val(mobileNumber);
                        $('#personId').val(personId);
                        $('#mobileform').submit();
                    }
                } else {
                    alert("Select the mobile number you want to choose.");
                }
            });
            $('#numberTable tbody tr').click(function() {
                var mobileNumber = $(this).find("td:eq(2)").text();
                var personId = $(this).find("td:eq(6)").text();
                $('#mobiles').val(mobileNumber);
                $('#personId').val(personId);
                $('#mobileform').submit();
            });
        });
    </script>
@endsection
