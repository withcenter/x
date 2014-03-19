$(function(){
	
	$(".login-button").click(function(){
		if ($(this).hasClass('active-popup-menu')) {
			$(this).removeClass('active-popup-menu');
		} else {
			$(this).siblings().removeClass('active-popup-menu');
			$(this).addClass('active-popup-menu')
		}

		$('.login-container').siblings('.toggled').toggle().removeClass('toggled');
		$('.login-container').toggle().addClass('toggled');	
	});
	
	/**
	$(".statistics-button").click(function(){
		if ($(this).hasClass('active-popup-menu')) {
			$(this).removeClass('active-popup-menu');
		} else {
			$(this).siblings().removeClass('active-popup-menu');
			$(this).addClass('active-popup-menu')
		}
		$('.statistics-container').toggle().addClass('toggled');
	});
	*/
	
		$(".search-button").click(function(){
		if ($(this).hasClass('active-popup-menu')) {
			$(this).removeClass('active-popup-menu');
		} else {
			$(this).siblings().removeClass('active-popup-menu');
			$(this).addClass('active-popup-menu')
		}

		$('.search-container').siblings('.toggled').toggle().removeClass('toggled');
		$('.search-container').toggle().addClass('toggled');
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
});
