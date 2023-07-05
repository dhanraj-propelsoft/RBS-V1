@extends('layout.app')
@section('content')
<div class="card col-md-6 m-auto p-3  order-confirm" style="height:100%;">
    <div class="card-header d-flex align-items-center">
        <div style="width:80px;">
          <button type="button" class="border-0 bg-white revert-order-details">
              <i class="fa fa-edit ml-2" ></i>
              </button>
          <button type="button" class="btn-close"  aria-label="Close"></button>
      </div>


      </div>
      <div class="card-body">
      </div>

      <div class="row">
  <h5><b>Thank You For becoming our valuable customer. Our support team will contact you shortly</b></h5>
      </div>

      </div>
    </div>
</div>
<script>
  $(function () {
    $(".order_confirm").click(function(){
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
				if (result.dismiss === Swal.DismissReason.timer || result.isConfirmed === true) {
					window.history.pushState(null, null, "/");
					window.location.replace("/");
					// Add a new history entry with a different URL

				}

			})
		});
  });
</script>
@endsection