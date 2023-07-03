@extends('admin.layout.app')
@section('content')
    <table class="table" id="serviceTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Service Name</th>
                <th>Price</th>
                <th>Special Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $data)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td>{{ isset($data['eff_date']) ? $data['eff_date'] : '' }}</td>
                    <td>{{ $data['service_name'] }}</td>
                    <td>{{ $data['mrp'] }}</td>
                    <td>{{ $data['special_price'] }}</td>
                    <td><button type="button" class="btn btn-sm btn-success">Active</button></td>
                    <td><a href="{{ route('ServiceType.edit', $data['id']) }}"><button type="button" class="btn btn-sm btn-primary mx-2"><i class="fa fa-pencil"></i></button>
                      </a><button
                            type="button" onclick="confirmDelete('{{ $data['id'] }}')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {

            var table = $('#serviceTable').DataTable();







            $(document).on('click', ".remove-date", function() {
                // alert("ok");
                $(this).prev().val("");
            });

        });
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('serviceDestory') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        },
                        success: function(data) {
                                    location.reload()

                        },
                        error: function(err) {
                            // Handle the error response
                            console.log(err);
                        }
                    });

                }
            });
        }
        var addUrl = '{{ route('ServiceType.create') }}';
        $(".navbar .container-fluid").append("<a href='" + addUrl + "' class='btn btn-primary btn-sm'>Add Service</a>");
    </script>
@endsection
