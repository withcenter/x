$(function(){
	
	$(".login-button").click(function(){
		if ( $('.search-container').hasClass('selected') ) $('.search-container').removeClass('selected');
		if ($(this).hasClass('active-popup-menu')) {
			$(this).removeClass('active-popup-menu');
			$('.login-container').removeClass('selected');
		} else {
			$(this).siblings().removeClass('active-popup-menu');
			$(this).addClass('active-popup-menu')
			$('.login-container').addClass('selected');
		}
	});
	
	$(".search-button").click(function(){
		if ( $('.login-container').hasClass('selected') ) $('.login-container').removeClass('selected');
		if ($(this).hasClass('active-popup-menu')) {
			$(this).removeClass('active-popup-menu');
			$('.search-container').removeClass('selected'); 
		} else {
			$(this).siblings().removeClass('active-popup-menu');
			$(this).addClass('active-popup-menu')
			$('.search-container').addClass('selected');
		}
		
	});
	
	$('.top-posts').mouseenter(function(){
		$(this).find('.top-posts-container').show();
	});
	
	$('.top-posts').mouseleave(function(){
		$(this).find('.top-posts-container').hide();
	});
	
	$('.bottom-post').mouseenter(function(){
		$(this).find('.bottom-posts-container').show();
	});
	
	$('.bottom-post').mouseleave(function(){
		$(this).find('.bottom-posts-container').hide();
	});
	
	$('.right-post').mouseenter(function(){
		$(this).find('.right-posts-container').show();
	});
	
	$('.right-post').mouseleave(function(){
		$(this).find('.right-posts-container').hide();
	});

});
