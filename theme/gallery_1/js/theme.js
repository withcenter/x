$(function(){
	$('#gallery_1_main_menu li a').mouseenter(function(){		
		triangle_left = $(this).width()/2+9;		
		$(this).find('.highlight').css('left',triangle_left);
		$(this).addClass('selected');
	});
	
	$('#gallery_1_main_menu li a').mouseleave(function(){				
		$(this).removeClass('selected');
	});
});