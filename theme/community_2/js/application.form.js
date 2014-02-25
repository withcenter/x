$(function() {
	$(".application-form .pannel-bottom .dropdown-icon").click(function() {
		$extra_form = $(".application-form  .extra-form");
		if ( $extra_form.css("display") == 'none') {
			$(".application-form").css("width", "700px");
			$(".application-form  .extra-form, .application-form .item").show("slow");
		}
		else {
			$(".application-form").css("width", "180px");
			$(".application-form  .extra-form, .application-form .item").hide("slow");
		}
	});
	
	$(".application-form input[type=text]").keyup(function() {
		$extra_form = $(".application-form  .extra-form");
		if ( $extra_form.css("display") == "none" )  {
			$(".application-form").css("width", "700px");
			$(".application-form  .extra-form, .application-form .item").show("slow");
		}
	});
	
	$(".application-form .captcha img, .application-form .pannel-bottom .reset-icon").click(function() {
		$(".application-form .captcha img").prop('src', './x/theme/withcenter/captcha.php');
	});
}); 

function callback_application_submit( message ) {
	$(".application-form input[type='image'], .application-form .captcha, .application .reset-icon").remove();	
	$(".application-form input[type='text'], .application-form textarea, .application-form .row").prop("disabled", 1).css("background-color", "#e7f7f4");
	
	$(".application-form .sucess-message").html("<span class='success'>" + message + "</span>");
}	
