$(function(){
	$(".header .top-search .menu-dropdown-button").click(function(){
		$(".header .top-menu").toggle();
	});

	$(".top-search-button").click(function(){
		$(".search-container").slideToggle(200);
	});
	
	$(".close-search").click(function(){
		$(".search-container").slideToggle(200);
	});
	
	$(".mobile-main-menu li.menu-title").click(function(){
		$(".mobile-main-menu li.sub").toggle();
	});
	
	$('.banner-container').click(function(){
		$('.banner').animate({left:"-=100%"},500);
	});
});