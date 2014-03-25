$(function(){
	var show_button, hide_button;
	$(".login-button").click(function(){
		show_login();
	});
	
	$(".logout-button").mouseenter(function(){
		show_button = setTimeout( function() { show_login() }, 100 );
	});	
	
	$(".logout-button").mouseleave(function(){
		if ( show_button ) clearTimeout(show_button);
		hide_button = setTimeout( function() {if ($('.login-button').hasClass('active-popup-menu')) {
			$('.login-button').removeClass('active-popup-menu');
			$('.login-container').removeClass('selected');
		}}, 200);
	});
	
	$(".login-container").mouseenter(function(){
		clearTimeout(hide_button);
	});
	
	$(".login-container").mouseleave(function(){
		show_login();
	});
	
	
	function show_login()  {
		if ( $('.search-container').hasClass('selected') ) $('.search-container').removeClass('selected');
		if ($('.login-button').hasClass('active-popup-menu')) {
			$('.login-button').removeClass('active-popup-menu');
			$('.login-container').removeClass('selected');
		} else {
			$('.login-button').siblings().removeClass('active-popup-menu');
			$('.login-button').addClass('active-popup-menu')
			$('.login-container').addClass('selected');
		}
	};
	
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
	
	/* CLICK ON LINKS ON GALLERY POSTS */
	$('.top-posts').click(function(){
		window.location=$(this).find("a.read_more").attr("href"); 
	});

	$('.bottom-post').click(function(){
		window.location=$(this).find("a.read_more").attr("href"); 
	});
	
	$('.right-post').click(function(){
		window.location=$(this).find("a.read_more").attr("href"); 
	});
	


});
