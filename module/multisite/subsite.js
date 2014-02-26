$(function() {
	$(".select-wrapper, .select-button").click(function() {
		$dropdown = $(this).parent().find('.drop-down-menu');
		if ( $dropdown.css("display") == "none") $dropdown.slideDown();
		else $dropdown.slideUp();
	});
	
	$(".drop-down-menu .row").click(function() {
		var bo_table = $(this).attr('bo_table');
		var bo_subject = $(this).attr('bo_subject');
		$(this).parent().parent().find(".hidden-value").val( bo_table );
		$(this).parent().parent().find('.select-wrapper .inner').text( bo_subject );
		
		$(this).parent().hide();
	});
	
	$(".config-wrapper .config-title").click(function() {
		$dropdown = $(this).parent('.config-wrapper').find('.config-container');
		if ( $dropdown.css("display") == "none") $dropdown.slideDown('fast');
		else $dropdown.slideUp('fast');
	});
	
});