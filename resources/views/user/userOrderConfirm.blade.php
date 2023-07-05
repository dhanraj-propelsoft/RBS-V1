@extends('layout.app')
@section('content')
    <div class="card col-md-6 m-auto p-3  order-confirm" style="height:100%;">
        <div class="card-header d-flex align-items-center">
            <h5 class="text-center w-100">Order Details</h5>
            <div style="width:80px;">
                <button type="button" class="border-0 bg-white revert-order-details">
                    <i class="fa fa-edit ml-2"></i>
                </button>
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>


        </div>
        <div class="card-body">
        </div>

        <div class="row">
            <h5 class="col-md-6">Date & Time of Supply:</h5>
            <p class="col-md-6" data-from="datetime">{{ $orderDetail['date_time_of_supply'] }}</p>
        </div>
        <div class="row">
            <h5 class="col-md-6">Site Address:</h5>
            <p class="col-md-6" data-from="siteAddresses">{{ $orderDetail['site_street'] }},{{ $orderDetail['site_city'] }}
            </p>
        </div>
        <div class="row">
            <h5 class="col-md-6">Billing Address:</h5>
            <p class="col-md-6" data-from="billAddresses">
                {{ $orderDetail['billing_street'] }},{{ $orderDetail['billing_city'] }}</p>
        </div>
        <div class="row">
            <h5 class="col-md-6">Concrete Grade:</h5>
            <p class="col-md-6" data-from="conGrade">{{ $orderDetail['product_name'] }}</p>
        </div>
        <div class="row">
            <h5 class="col-md-6 ">Quantity in cubic meter:</h5>
            <p class="col-md-6" data-from="quantity">{{ $orderDetail['quantity'] }}</p>
        </div>
        <div class="row">
            <h5 class="col-md-6">Service:</h5>
            <p class="col-md-6" data-from="service">{{ $orderDetail['service_name'] }}</p>
        </div>
        <div class="row">
            <h5 class="col-md-6">Net Amount:</h5>
            <p class="col-md-6" data-from="netAmount">{{ $orderDetail['total_amount'] ? $orderDetail['total_amount'] : 0 }}
            </p>
        </div>
        <div class="row">
            <h5 class="col-md-6">Advance:</h5>
            <p class="col-md-6" data-from="advance">{{ $orderDetail['advance'] ? $orderDetail['advance'] : 0 }}</p>
        </div>
        <div class="row">
            <h5 class="col-md-6">Remark:</h5>
            <p class="col-md-6" data-from="remarks">{{ $orderDetail['remark'] }}</p>
        </div>
        <a href="{{ route('userOrderConfirmStatus', ['id' => $id]) }}"
            class="btn btn-primary col-12 col-md-6 col-lg-6 m-auto">Order Confirm</a>
    </div>
    </div>
    </div>
    <script>
        $(function() {
            $(".order_confirm").click(function() {
                let timerInterval
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-primary',

                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    confirmButtonText: 'Go to Home',

                    html: 'ThankYou for  becoming our valuable customer .Our support team will contact you  shortly.',
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: () => {
                        // Swal.showLoading()
                        // const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer || result.isConfirmed ===
                        true) {
                        window.history.pushState(null, null, "/");
                        window.location.replace("/");
                        // Add a new history entry with a different URL

                    }

                })
            });
        });
    </script>
@endsection
