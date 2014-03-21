$(function() {
	parent.callback_iframe_resize( $(".template").height() );
	
	$(".template .inactive").click(function() {
		var src = $(this).children('img').attr('src');
		var theme_value = $(this).attr('theme_value');
		var theme_name = $(this).attr('theme_name');
		parent.callback_preview( src, theme_value, theme_name );
	});
});

