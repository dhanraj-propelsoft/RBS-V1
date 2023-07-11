$(function () {
	// jQuery Code to Hide Spinner on Complete Page Load
	//  $("body").on('load', function() {
	$('.spinner').fadeOut();
	//   });

	$("[hover]").hover(
		function () {
			let Hover = $(this).attr("hover");
			// On mousein, toggle the btn-outline-success and btn-success classes
			$(this).toggleClass(Hover);
		},
		function () {
			let Hover = $(this).attr("hover");
			// On mouseout, toggle the btn-success and btn-outline-success classes
			$(this).toggleClass(Hover);
		}
	);


	$("[styleModify]").click(function (e) {
		e.preventDefault();
		$($(this).attr("styleModify")).toggleClass($(this).attr("styleModifyToggleClasses"));
	});
	$(".sidebar-29-05-2023 .nav-link").hover(
		function () {

			// On mousein, toggle the btn-outline-success and btn-success classes
			$(this).toggleClass("active");
		},
		function () {

			// On mouseout, toggle the btn-success and btn-outline-success classes
			$(this).toggleClass("active");
		}
	);


	if ($('.form_datetime').length > 0) {
		$('.form_datetime').datetimepicker({
			weekStart: 1,
			todayBtn: 1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
			showMeridian: 1
		});
	}

	if ($('.form_date').length > 0) {
		$('.form_date').datetimepicker({
			weekStart: 1,
			todayBtn: 1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
	}

	if ($('.form_time').length > 0) {
		$('.form_time').datetimepicker({
			weekStart: 1,
			todayBtn: 1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
		});
	}

	$(function () {
		if ($('#datetimepicker1').length > 0) {
			$('#datetimepicker1').datetimepicker();
		}
	});

	$(function () {
		if ($('#datetimepicker4').length > 0) {
			$('#datetimepicker4').datetimepicker({
				pickTime: false
			});
		}

		if ($('#datetimepicker3').length > 0) {
			$('#datetimepicker3').datetimepicker({
				format: 'DD/MM/YYYY'
			});
		}
	});



});

$(window).on("load", function () {
	$("[target_number]").each(function () {
		var targetNumber = $(this).attr("target_number"); // The number you want to reach

		var duration = 800; // The duration of the animation in milliseconds

		$(this).animate({
			num: targetNumber
		}, {
			duration: duration,
			step: function (now) {
				$(this).text(Math.floor(now));
			}
		});
	});
});
$('.select2').select2({
	minimumResultsForSearch: Infinity
});
$(".status-change li").click(function () {
	var switchId = $(this).parent().attr("aria-labelledby");
	var switchValue = $(this).text();
	var dropdownClass = $(this).children().attr("dropdown-class");
	$(this).parent().prev().text(switchValue);
	var switchElement = $(this).parent().prev();

	// Get the class attribute value of the element
	var classAttributeValue = switchElement.attr("class");

	// Split the class attribute value by spaces to get individual classes
	var classes = classAttributeValue.split(" ");

	// Find classes that have a prefix of "btn-"
	var btnClasses = classes.filter(function (className) {
		return className.startsWith("badge-");
	});
	// Toggle the classes with dropdownClass
	
	var btnClass = btnClasses[0];
switchElement.removeClass(btnClass);
console.log(dropdownClass);
switchElement.addClass(dropdownClass);

});

// JavaScript (jQuery)
$("[fs]").each(function() {
	$(this).css("font-size", $(this).attr("fs"));
  });
  $(document).ready(function() {
	$(window).on("pageshow", function(event) {
	  $("form input").each(function() {
		if (!$(this).hasClass("active") && $(this).val().trim() != "") {
		  $(this).addClass("active");
		}
	  });
	});
  });
  
  