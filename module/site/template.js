$(function() {
	parent.callback_iframe_resize( $(".template").height() );
	
	$(".template .inactive").click(function() {
		var src = $(this).find('img').attr('src');
		var theme_value = $(this).attr('theme_value');
		var theme_name = $(this).attr('theme_name');
		parent.callback_preview( src, theme_value, theme_name );
	});
	
	$(".inactive").click(function() {
		$('.view-overlay').removeClass('selected');
		$(this).find('.view-overlay').addClass('selected');
		$(this).find('.theme-name').hide();
	});
	
	$(".inactive").mouseenter(function() {
		$('.view-overlay').removeClass('selected');
		$(this).find('.view-overlay').addClass('selected');
		$(this).find('.theme-name').hide();
	});
	
	$(".inactive").mouseleave(function() {
		$('.view-overlay').removeClass('selected');
		$(this).find('.theme-name').show();
	});
});

