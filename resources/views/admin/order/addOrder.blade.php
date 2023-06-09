@extends('admin.layout.app')
@section('content')
    <form class="d-flex col-8 m-auto mb-2 mt-2">
        <div class="form-outline">
            <input type="text" id="mobileNumberInput" class="form-control" pattern="[0-9]{10,10}"
                oninput="this.value=this.value.replace(/[^\d]/,'')" required maxlength="10"
                placeholder="Enter Customer Mobile Number For Find" />
            <label class="form-label" for="mobileNumberInput">Mobile Number</label>
        </div>

        <button type="button" class="btn btn-primary col-3 mx-2 addNew">Add New Order</button>
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
                                <input class="form-check-input" type="radio" name="userConfirm" id="Engineer" required />
                                <label class="form-check-label" for="Engineer">Engineer/Builder/Agent</label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="userConfirm" id="customer" required />
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
    <table id="numberTable" class="table table-border table-sm ">
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
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>1234567890</td>
                <td>johndoe@example.com</td>
                <td>ABC Company</td>
                <td>Manager</td>
            </tr>
            <tr>
                <td>2</td>
                <td>John Doe</td>
                <td>1234567890</td>
                <td>johndoe@example.com</td>
                <td>ABC Company</td>
                <td>Manager</td>
            </tr>

            <tr>
                <td>3</td>
                <td>Jane Doe</td>
                <td>9876543210</td>
                <td>janedoe@example.com</td>
                <td>XYZ Company</td>
                <td>Senior Manager</td>
            </tr>

            <tr>
                <td>4</td>
                <td>Bill Smith</td>
                <td>555-555-5555</td>
                <td>billsmith@example.com</td>
                <td>DEF Company</td>
                <td>Director</td>
            </tr>

            <tr>
                <td>5</td>
                <td>Mary Jones</td>
                <td>444-444-4444</td>
                <td>maryjones@example.com</td>
                <td>GHI Company</td>
                <td>Vice President</td>
            </tr>

            <tr>
                <td>6</td>
                <td>Tom Brown</td>
                <td>333-333-3333</td>
                <td>tombrown@example.com</td>
                <td>JKL Company</td>
                <td>President</td>
            </tr>

            <tr>
                <td>7</td>
                <td>Sally Green</td>
                <td>222-222-2222</td>
                <td>sallygreen@example.com</td>
                <td>MNO Company</td>
                <td>CEO</td>
            </tr>

            <tr>
                <td>8</td>
                <td>Peter White</td>
                <td>111-111-1111</td>
                <td>peterwhite@example.com</td>
                <td>PQR Company</td>
                <td>COO</td>
            </tr>

            <tr>
                <td>9</td>
                <td>Susan Black</td>
                <td>000-000-0000</td>
                <td>susanblack@example.com</td>
                <td>STU Company</td>
                <td>CFO</td>
            </tr>

            <tr>
                <td>10</td>
                <td>David Blue</td>
                <td>999-999-9999</td>
                <td>davidblue@example.com</td>
                <td>UVW Company</td>
                <td>CTO</td>
            </tr>

            <tr>
                <td>11</td>
                <td>Lily Red</td>
                <td>888-888-8888</td>
                <td>lilyred@example.com</td>
                <td>XYZ Company</td>
                <td>CMO</td>
            </tr>

            <tr>
                <td>12</td>
                <td>Ben Green</td>
                <td>777-777-7777</td>
                <td>bengreen@example.com</td>
                <td>ABC Company</td>
                <td>CIO</td>
            </tr>

            <tr>
                <td>13</td>
                <td>Alex Black</td>
                <td>666-666-6666</td>
                <td>alexblack@example.com</td>
                <td>DEF Company</td>
                <td>HR Manager</td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <button type="reset" class="btn btn-secondary reset-btn">Reset</button>
        <button type="button" class="btn btn-primary mx-4 next-btn">Next</button>
    </div>



    <script>
        $(function() {
            // Get the input element
            var input = $("#mobileNumberInput");

            // Add an event listener to detect changes in the input
            input.on("input", filterTable);
            filterTable();
            // Function to filter the table based on the mobile number input
            function filterTable() {
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
                } else {
                    addNewBtn.prop("disabled", false);
                    $(".next-btn").prop("disabled", true);
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
                    alert("Mobile Number: " + mobileNumber);
                } else {
                    alert("Select the mobile number you want to choose.");
                }
            });

        });
    </script>
@endsection
