@extends('admin.layout.app')
@section('content')
    <table class="table" id="productTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Product Name</th>
                <th scope="col">MRP / m <sup>3</sup></th>
                <th scope="col">Special Price</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table rows will be added dynamically with data from your backend -->
            @foreach ($results as $data)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td>{{ $data['eff_date'] }}</td>
                    <td>{{ $data['product_name'] }}</td>
                    {{-- <td>{{ $data['rate'] }}</td> --}}
                    <td>{{ $data['mrp'] }}</td>
                    <td>{{ $data['special_price'] }}</td>
                    <td>
                        <div class="dropdown">
                            <span class="badge badge-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-mdb-toggle="dropdown" aria-expanded="false">
                                Active
                            </span>
                            <ul class="status-change dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#" dropdown-class="badge-success">Active</a></li>
                                <li><a class="dropdown-item" href="#" dropdown-class="badge-danger">In Active</a></li>

                            </ul>
                        </div>
                    </td>
                    <td>
                        <!-- Action buttons here -->
                        <a href="{{ route('product.edit', $data['id']) }}"><button class="btn btn-sm btn-primary"><i
                                    class="fa fa-pencil"></i></button></a>
                        <button onclick="confirmDelete('{{ $data['id'] }}')" class="btn btn-sm btn-danger"><i
                                class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#productTable').DataTable({
                language: {
                    lengthMenu: '_MENU_'
                },
                initComplete: function(settings, json) {
                    $('.dataTables_length select').select2({
                        dropdownCssClass: 'select2',
                        minimumResultsForSearch: Infinity
                    });
                    // $("select2").trigger("change");
                }
            });

            $(document).on('click', ".remove-date", function() {
                // alert("ok");
                $(this).prev().val("");
            });

        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'orange',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('productDestory') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        },
                        success: function(data) {
                            if (data) {
                                location.reload()
                            }
                        },
                        error: function(err) {
                            // Handle the error response
                            console.log(err);
                        }
                    });

                }
            });
        }

        var addUrl = '{{ route('product.create') }}';
        $(".navbar .container-fluid").append("<a href='" + addUrl + "' class='btn btn-primary btn-sm'>Add Product</a>");
    </script>
@endsection
