$(function(){		
	$('ul#tnb > li a').mouseenter(function() {
			$(this).addClass('selected');
	});
	$('ul#tnb > li a').mouseleave(function() {
			$(this).removeClass('selected');
	});	
	
	$('ul#tnb > li a').each(function() {
		if(window.location.pathname == '/') {
				$('ul#tnb > li a:first-child').eq(0).parent().addClass('selected');
			}
		else if(window.location.href == $(this).attr('href')) {
				$(this).parent().addClass('selected');
			}
	});
});
