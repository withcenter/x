$(function() {
	$(".application-management .row .application").click(function() {
		$description = $(this).parent().find(".description");
		
		if ( $description.css("display") == 'none' ) $description.slideDown("slow");
		else $description.slideUp("slow");
	});
});