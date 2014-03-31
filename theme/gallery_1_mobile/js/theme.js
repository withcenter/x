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
		if( $('.login_icon_wrapper').hasClass('selected') ){
			$('.login_icon_wrapper').removeClass('selected');
		}
		if( $(this).hasClass('selected') ) $(this).removeClass('selected');
		else $(this).addClass('selected');	
		$('.gallery_1_search_text_mobile_wrapper').toggle();
		$('.layout .header  .search_and_login_wrapper .search.triangle-border').toggle();
		$('.layout .header  .search_and_login_wrapper .search.triangle').toggle();
		$('.gallery_mobile_outlogin_wrapper').hide();
		$('.layout .header  .search_and_login_wrapper .login.triangle-border').hide();
		$('.layout .header  .search_and_login_wrapper .login.triangle').hide();
		
		if( $('#gallery_1_search_text_mobile').val() == '' ) return false;							
	});	
	
	$('.login_icon_wrapper').click(function(){
		if( $('#gallery_1_search_submit_mobile').hasClass('selected') ){
			$('#gallery_1_search_submit_mobile').removeClass('selected');
		}		
		$('.gallery_mobile_outlogin_wrapper').toggle();
		$('.layout .header  .search_and_login_wrapper .login.triangle-border').toggle();
		$('.layout .header  .search_and_login_wrapper .login.triangle').toggle();
		$('.gallery_1_search_text_mobile_wrapper').hide();
		$('.layout .header  .search_and_login_wrapper .search.triangle-border').hide();
		$('.layout .header  .search_and_login_wrapper .search.triangle').hide();

		if( $(this).hasClass('selected') ) $(this).removeClass('selected');
		else $(this).addClass('selected');
	});
});