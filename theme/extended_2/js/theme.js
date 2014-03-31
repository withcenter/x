$(function(){
	$(".template_photo").mouseenter(function(){
		$(this).find('.template_info').show();
	});
	$(".template_photo").mouseleave(function(){
		$(this).find('.template_info').hide();
	});
	
	$(".skin_gallery .skin").mouseenter(function(){
		$(this).find('.skin_name').show();
	});
	$(".skin_gallery .skin").mouseleave(function(){
		$(this).find('.skin_name').hide();
	});
	
	var float_timeout;
	$(window).scroll(function(e){
	clearTimeout(float_timeout);
		float_timeout = setTimeout(function(){
			var top_scroll = $(this).scrollTop();
			if ( top_scroll >= 180 ) {
				top_scroll = top_scroll - 180;
				$('.call_us_bubble').animate({
					top: top_scroll
				}, 500);
			} else {
			$('.call_us_bubble').animate({
					top: top_scroll - top_scroll
				}, 500);
			}
		}, 300);		
	});
	
	
});