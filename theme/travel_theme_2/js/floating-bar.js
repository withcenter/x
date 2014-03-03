$(function(){
var float_timeout;
	$(window).scroll(function(e){
	clearTimeout(float_timeout);
		float_timeout = setTimeout(function(){
			var top_scroll = $(this).scrollTop() + 147;
			$('.floating-bar').animate({
				top: top_scroll
			}, 500);
		}, 300);		
	});

		
	$('.floating-bar .back-to-top').click(function(){
		$(window).scrollTop(0);
	});
});