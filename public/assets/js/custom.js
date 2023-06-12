$(function () {
	 // jQuery Code to Hide Spinner on Complete Page Load
	 $(window).on('load', function() {
		$('.spinner').fadeOut();
	  });

    $("[hover]").hover(
        function() {
          let Hover=$(this).attr("hover");
          // On mousein, toggle the btn-outline-success and btn-success classes
          $(this).toggleClass(Hover);
        },
        function() {
          let Hover=$(this).attr("hover");
          // On mouseout, toggle the btn-success and btn-outline-success classes
          $(this).toggleClass(Hover);
        }
      );


      $("[styleModify]").click(function (e) { 
        e.preventDefault();
        $($(this).attr("styleModify")).toggleClass($(this).attr("styleModifyToggleClasses"));
      });
      $(".sidebar-29-05-2023 .nav-link").hover(
        function() {
          
          // On mousein, toggle the btn-outline-success and btn-success classes
          $(this).toggleClass("active");
        },
        function() {
       
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

$(window).on("load",function(){
	$("[target_number]").each(function() {
		var targetNumber = $(this).attr("target_number"); // The number you want to reach
	  
		var duration = 800; // The duration of the animation in milliseconds
	  
		$(this).animate({
		  num: targetNumber
		}, {
		  duration: duration,
		  step: function(now) {
			$(this).text(Math.floor(now));
		  }
		});
	  });
});
$('.select2').select2({
    minimumResultsForSearch: Infinity
  });

  