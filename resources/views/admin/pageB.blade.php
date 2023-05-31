@extends('admin.layout.app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<table id="orderTable" class="display table align-middle mb-0 bg-white">
    <thead class="bg-light">
        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Order Date</th>
            <th>Shipping Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>Product 1</td>
            <td>2</td>
            <td>$10.00</td>
            <td>5%</td>
            <td>2023-05-01</td>
            <td>123 Main St, City</td>
            <td>Shipped</td>
            <td><button>Edit</button></td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#orderTable').DataTable();
        });
    </script>
@endsection