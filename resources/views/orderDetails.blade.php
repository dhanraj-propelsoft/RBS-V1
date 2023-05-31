@extends('layout.app')
@section('content')

<div class="d-flex justify-content-start align-items-sm-start flex-column   main-container" >
   
    <section class=" card mt-5 p-2 wizard-section col-11 col-md-7 col-lg-7 m-auto" style="height:100%;">
		<div class="row no-gutters justify-content-center">
		
			<div class="col-lg-11 col-md-11">
				<div class="form-wizard">
					<form action="" method="post" role="form">
						<div class="form-wizard-header">
							<button type="button" class="btn-close float-end"  aria-label="Close"></button>
							<h5 class="text-center wizard_name">Site Address</h5>
							
							<ul class="list-unstyled form-wizard-steps clearfix d-flex justify-content-center">
								<li class="active"><span>1</span></li>
								<li><span>2</span></li>
								<li><span>3</span></li>
								
							</ul>
						</div>
						<fieldset class="wizard-fieldset show" wizard-title='Site Address' wizardFirst>
							<div class="row">
								<div class="col-md-6 mb-4">
									<div class="form-outline">
										<input type="text" id="siteName" class="form-control" name="siteName" />
										<label class="form-label" for="siteName">Site Name</label>
									</div>
								</div>
								<div class="col-md-6 mb-4">
									<div class="form-outline">
										<input type="text" id="siteNumber" class="form-control" name="siteNumber" required />
										<label class="form-label" for="siteNumber">Site / Plot Number<sup class="text-red">*</sup></label>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-md-6 mb-4">
									<div class="form-outline">
										<input type="text" id="streetCityState" class="form-control" name="streetCityState" required />
										<label class="form-label" for="streetCityState">Street, City, State<sup class="text-red">*</sup></label>
									</div>
								</div>
								<div class="col-md-6 mb-4">
									<div class="form-outline">
										<input type="text" id="city" class="form-control" name="city" required />
										<label class="form-label" for="city">City <sup class="text-red">*</sup></label>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-md-12 mb-4">
									<div class="form-outline">
										<input type="text" id="landmark" class="form-control" name="landmark" required />
										<label class="form-label" for="landmark">Landmark <sup class="text-red">*</sup></label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-4">
									<!-- Default checkbox -->
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="partyDetails" name="partyDetails" />
										<label class="form-check-label" for="partyDetails">Party Details</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="engineerDetails" name="engineerDetails" />
										<label class="form-check-label" for="engineerDetails">Engineer Details</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-4">
									<div class="form-outline">
										<input type="text" id="customerName" class="form-control" name="customerName" />
										<label class="form-label" for="customerName">Customer Name</label>
									</div>
								</div>
								<div class="col-md-6 mb-4">
									<div class="form-outline">
										<input type="text" id="customerMobile" class="form-control" name="customerMobile" pattern="[0-9]{10,10}" oninput="this.value=this.value.replace(/[^\d]/,'')"  maxlength="10"/>
										<label class="form-label" for="customerMobile">Customer Mobile Number</label>
									</div>
								</div>
							</div>
						
						
						

							  <div class="row">
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="text" id="engineerName" name="engineerName" class="form-control" />
									<label class="form-label" for="engineerName">Engineer Name</label>
								  </div>
								</div>
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="text" id="engineerMobile" name="engineerMobile" class="form-control" oninput="this.value=this.value.replace(/[^\d]/,'')" pattern="[0-9]{10,10}"  maxlength="10" />
									<label class="form-label" for="engineerMobile">Engineer Mobile Number</label>
								  </div>
								</div>
							  </div>
							  
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-next-btn float-end btn btn-primary">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset" wizard-title="Your Order">
						
							
							<div class="row">
								<div class="col-md-6 mb-4">
								
                                        <div class="form-group  col-md-12 align-items-center justify-content-between m-0">
                                            
                                            <div class="input-group date form_datetime col-md-12 p-0"
                                             data-date=""
                                                data-date-format="dd-mm-yyyy - HH:ii p" data-link-field="dtp_input2">
                                                <input class="form-control" size="16" type="text" value=""
                                                    placeholder="Date & Time Supply" id="datetime"  pattern="\d{2}-\d{2}-\d{4} - \d{2}:\d{2} (am|pm)" required  autocomplete="off" />
                                                
                                                <button class="input-group-addon rounded" style="background: transparent;border: 1px solid #bdbdbd;" ><span
                                                        class="fas fa-calendar"></span></button>
                                            </div>
                                            <input type="hidden" id="dtp_input2" name="date_time" value="" />


                                        </div>
								</div>
								
								<div class="col-md-6 mb-4">
									<select class="form-select" id="exampleSelect" required  aria-label="Select option">
										<option selected disabled>Select an option</option>
										<option value="">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
									  </select>
									  
								</div>
							  </div>
							  <div class="row">
								<div class="col-md-6 mb-4">
									<div class="form-outline">
									  <input type="text" id="ratePerCube" class="form-control" readonly value="30"  />
									  <label class="form-label" for="ratePerCube">Rate per m<sup>3</sup></label>
									</div>
								  </div>
								  <div class="col-md-6 mb-4">
									<div class="form-outline">
									  <input type="text" id="quantity" name="quantity" required class="form-control"  />
									  <label class="form-label" for="quantity">Quantity in m<sup>3</sup></label>
									</div>
								  </div>
							  </div> 
							  <div class="d-flex justify-content-center mb-4">
								<div class="d-inline-block">
									<div class="w-100">
										<label for="services">Service</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
										<label class="form-check-label" for="inlineCheckbox1">Pumb</label>
									  </div>
									  
									  <div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
										<label class="form-check-label" for="inlineCheckbox2">Boom</label>
									  </div>
									  <div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2" />
										<label class="form-check-label" for="inlineCheckbox3">Manual</label>
									  </div>
								  </div>
							  </div>
							 <div class="row mb-4">
								<div class="form-outline">
									<textarea class="form-control" id="Remarks" rows="4"></textarea>
									<label class="form-label" for="Remarks">Remarks</label>
								  </div>
							 </div>
							
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn btn btn-secondary float-start">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-end btn btn-primary">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset" wizard-title="Billing Address">
						
							<div class="row">
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="text" id="personName" name="personName" class="form-control" required />
									<label class="form-label" for="personName">Person Name / Organization Name <sup class="text-red">*</sup></label>
								  </div>
								</div>
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="text" id="blockPlotNumber" name="blockPlotNumber" class="form-control" required />
									<label class="form-label" for="blockPlotNumber">Block / Plot Number <sup class="text-red">*</sup></label>
								  </div>
								</div>
							  </div>
							  
							  <div class="row">
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="text" id="streetCityState" name="streetCityState" class="form-control" required />
									<label class="form-label" for="streetCityState">Street, City, State <sup class="text-red">*</sup></label>
								  </div>
								</div>
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="text" id="city" name="city" class="form-control" required />
									<label class="form-label" for="city">City <sup class="text-red">*</sup></label>
								  </div>
								</div>
							  </div>
							  
							  <div class="row">
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="number" id="netAmount" name="netAmount" class="form-control"  />
									<label class="form-label" for="netAmount">Net Amount </label>
								  </div>
								</div>
								<div class="col-md-6 mb-4">
								  <div class="form-outline">
									<input type="number" id="advance" name="advance" class="form-control"  />
									<label class="form-label" for="advance">Advance </label>
								  </div>
								</div>
							  </div>
							  
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn btn btn-secondary float-start">Previous</a>
								<a href="javascript:;" class="form-wizard-submit float-end btn btn-primary">Submit</a>
							</div>
						</fieldset>	
						
					</form>
				</div>
			</div>
		</div>
	</section>
	<div class="card col-md-6 m-auto p-3 d-none order-confirm" style="height:100%;">
	
			{{--  --}}
			
		
		<div class="card-header d-flex align-items-center">		
	      <h5 class="text-center w-100">Order Details</h5>
		  <div style="width:80px;">
			<button type="button" class="border-0 bg-white revert-order-details">
				<i class="fas fa-edit ml-2" ></i>
				</button>			
			<button type="button" class="btn-close"  aria-label="Close"></button>
		</div>  
		  
			
		</div>
		<div class="card-body">
		</div>
	
		<div class="row">
		  <h5 class="col-md-6">Date & Time of Supply:</h5>
		  <p class="col-md-6">12/08/2023, 12:00 pm</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Site Address:</h5>
		  <p class="col-md-6">westcross street, Trichy</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Billing Address:</h5>
		  <p class="col-md-6">propelsoft, BDU Campus</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Concrete Grade:</h5>
		  <p class="col-md-6">Grade: B</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Quantity in cubic meter:</h5>
		  <p class="col-md-6">32</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Service:</h5>
		  <p class="col-md-6">32</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Net Amount:</h5>
		  <p class="col-md-6">13:00</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Advance:</h5>
		  <p class="col-md-6">13:00</p>
		</div>
		<div class="row">
		  <h5 class="col-md-6">Remark:</h5>
		  <p class="col-md-6">this is remark</p>
		</div>
		  <a href="#" class="btn btn-primary col-12 col-md-6 col-lg-6 m-auto order_confirm" >Confirm</a>
		</div>
	  </div>
  </div>

  
<script>
    jQuery(document).ready(function() {
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
	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		var next = jQuery(this);
		var nextWizardStep = true;
		$('.error-input').remove();
		$('.trailing').remove();
		// console.log(parentFieldset.find("input[required]"));
		parentFieldset.find("input , select , textarea").each(function(){
			// console.log(this);
			var input = $(this);
  var value = input.val();
  var pattern = input.attr("pattern");

console.log(value);
  if (input.prop("required") && (value === null || value.trim() === "")) {
    // Handle required validation error
    console.log("Field is required: " + input.attr("name"));
	if(value === null){
		
		input.parent().append("<span class='text-danger error-input'> This is Required</span>");
	}
	else{
		if (input.attr('id') == "datetime") {
			input.parent().parent().append("<span class='text-danger error-input'> This is Required</span>");
		}
		else{
			input.parent().prepend(' <i class="fas fa-exclamation-circle trailing text-danger"></i>')
		input.parent().parent().append("<span class='text-danger error-input'> This is Required</span>");
		}

	}

	nextWizardStep = false;
  } else if (pattern && value.trim() !== "") {
    var regex = new RegExp(pattern);
    if (!regex.test(value)) {
	input.parent().parent().append("<span class='text-danger error-input'> Value is Invalid</span>");
	  nextWizardStep = false;
    }
  }

		});
		if( nextWizardStep) {
			next.parents('.wizard-fieldset').removeClass("show","400");
			currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
			next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
			jQuery(document).find('.wizard-fieldset').each(function(){
				if(jQuery(this).hasClass('show')){
					var formAtrr = jQuery(this).attr('data-tab-content');
					jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
						if(jQuery(this).attr('data-attr') == formAtrr){
							jQuery(this).addClass('active');
							var innerWidth = jQuery(this).innerWidth();
							var position = jQuery(this).position();
							jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
						}else{
							jQuery(this).removeClass('active');
						}
					});
				}
			});
			$(".wizard_name").html($(".wizard-fieldset.show").attr('wizard-title'));
		}
	});
	//click on previous button
	jQuery('.form-wizard-previous-btn').click(function() {
		var counter = parseInt(jQuery(".wizard-counter").text());;
		var prev =jQuery(this);
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		jQuery(document).find('.wizard-fieldset').each(function(){
			if(jQuery(this).hasClass('show')){
				var formAtrr = jQuery(this).attr('data-tab-content');
				jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
					if(jQuery(this).attr('data-attr') == formAtrr){
						jQuery(this).addClass('active');
						var innerWidth = jQuery(this).innerWidth();
						var position = jQuery(this).position();
						jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
					}else{
						jQuery(this).removeClass('active');
					}
				});
			}
		});
		$(".wizard_name").html($(".wizard-fieldset.show").attr('wizard-title'));
	});
	//click on form submit button
	jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
		// $(".wizard-section , .order-confirm").toggleClass("d-none");
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var nextWizardStep=true;
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		$('.error-input').remove();
		$('.trailing').remove();
parentFieldset.find('input').each(function() {
			var input = $(this);
  var value = input.val();
  var pattern = input.attr("pattern");
  if (input.prop("required") && (value === null || value.trim() === "")) {
    // Handle required validation error
    console.log("Field is required: " + input.attr("name"));
	// input.siblings('.trailing').remove();
	input.parent().prepend(' <i class="fas fa-exclamation-circle trailing text-danger"></i>')
	input.parent().parent().append("<span class='text-danger error-input'> This is Required</span>");
	nextWizardStep = false;
  } else if (pattern && value.trim() !== "") {
    var regex = new RegExp(pattern);
    if (!regex.test(value)) {
      // Handle pattern validation error
      console.log("Pattern is incorrect: " + input.attr("name"));
	input.parent().parent().append("<span class='text-danger error-input'> Value is Invalid</span>");
	  nextWizardStep = false;
    }
  }
 });
 console.log(nextWizardStep);
		if (nextWizardStep) {
			$(".wizard-section , .order-confirm").toggleClass("d-none");
		}
	});
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().addClass("focus-input");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
		}
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().removeClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideDown("3000");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideUp("3000");
		}
	});
});
$(".revert-order-details").click(function(){
	$(".wizard-section , .order-confirm").toggleClass("d-none");
	$(".show").removeClass("show");
	$("fieldset[wizardFirst]").addClass("show");
	$(".wizard_name").html($(".wizard-fieldset.show").attr('wizard-title'));
});
</script>
<style>







.form-wizard .form-wizard-header {
  text-align: center;
}

.form-wizard .wizard-fieldset {
  display: none;
}
.form-wizard .wizard-fieldset.show {
  display: block;
}


.form-wizard .form-wizard-steps {
  margin: 30px 0;
}
.form-wizard .form-wizard-steps li {
  width: 25%;
  float: left;
  position: relative;
}
.form-wizard .form-wizard-steps li::after {
  background-color: #f3f3f3;
  content: "";
  height: 5px;
  left: 0;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 100%;
  border-bottom: 1px solid #dddddd;
  border-top: 1px solid #dddddd;
}
.form-wizard .form-wizard-steps li span {
  background-color: #dddddd;
  border-radius: 50%;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  position: relative;
  text-align: center;
  width: 40px;
  z-index: 1;
}
.form-wizard .form-wizard-steps li:last-child::after {
  width: 50%;
}
.form-wizard .form-wizard-steps li.active span, .form-wizard .form-wizard-steps li.activated span {
  background-color: #1a8de4;
  color: #ffffff;
}
.form-wizard .form-wizard-steps li.active::after, .form-wizard .form-wizard-steps li.activated::after {
  background-color: #1a8de4;
  left: 50%;
  width: 50%;
  border-color: #1a8de4;
}
.form-wizard .form-wizard-steps li.activated::after {
  width: 100%;
  border-color: #1a8de4;
}
.form-wizard .form-wizard-steps li.activated:last-child:after {
  width: 50%;
  border-color: #1a8de4;
}
.form-wizard .form-wizard-steps li:last-child::after {
  left: 0;
}
.form-wizard .wizard-password-eye {
  position: absolute;
  right: 32px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}
@keyframes click-radio-wave {
  0% {
    width: 25px;
    height: 25px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    width: 60px;
    height: 60px;
    margin-left: -15px;
    margin-top: -15px;
    opacity: 0.0;
  }
}
@media screen and (max-width: 767px) {
  .wizard-content-left {
    height: auto;
  }
}




</style>
@endsection