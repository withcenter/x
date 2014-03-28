$(function(){
	$('#gallery_1_main_menu_mobile li a').mouseenter(function(){		
		triangle_left = $(this).width()/2-2;		
		$(this).find('.highlight').css('left',triangle_left);
		$(this).addClass('selected');
	});
	
	$('#gallery_1_main_menu_mobile li a').mouseleave(function(){				
		$(this).removeClass('selected');
	});
	
	var do_search = false;
	$('#gallery_1_search_submit_mobile').click(function(){
		if( $(this).hasClass('selected') ) $(this).removeClass('selected');
		else $(this).addClass('selected');	
		$('.gallery_1_search_text_mobile_wrapper').toggle();
		if( !do_search ) return false;		
		//do_search.toggle();
	});
	
	$('.login_icon_wrapper').click(function(){
		$('.gallery_mobile_outlogin_wrapper').toggle();
		if( $(this).hasClass('selected') ) $(this).removeClass('selected');
		else $(this).addClass('selected');
	});
});