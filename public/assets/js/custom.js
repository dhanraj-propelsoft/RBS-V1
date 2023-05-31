$(function () {
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
      $(".sideabr-29-05-2023 .nav-link").hover(
        function() {
          
          // On mousein, toggle the btn-outline-success and btn-success classes
          $(this).toggleClass("active");
        },
        function() {
       
          // On mouseout, toggle the btn-success and btn-outline-success classes
          $(this).toggleClass("active");
        }
      );

      $('.form_datetime').datetimepicker({
		    weekStart: 1,
		    todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
		    showMeridian: 1
		});
		$('.form_date').datetimepicker({
		    weekStart: 1,
		    todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
		$('.form_time').datetimepicker({
		    weekStart: 1,
		    todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
		});
		$(function () {
            $('#datetimepicker1').datetimepicker();
        });
		 $(function() {
			    // Bootstrap DateTimePicker v3
			    $('#datetimepicker4').datetimepicker({
			      pickTime: false
			    });
			    // Bootstrap DateTimePicker v4
			    $('#datetimepicker3').datetimepicker({
			      format: 'DD/MM/YYYY'
			    });
			  });
		
      
});
