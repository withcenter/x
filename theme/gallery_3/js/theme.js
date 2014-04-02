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
		var imgsrc = $(".arrow_icon").attr('src');
		var imgpath = imgsrc.substring(imgsrc.lastIndexOf('/'),0);
		if ( imgsrc == imgpath+"/arrow_down.png" ) $(".arrow_icon").attr('src', imgpath+"/arrow_up.png");
		else $(".arrow_icon").attr('src', imgpath+"/arrow_down.png");
	});
	
	$('.banner-container').click(function(){
		$('.banner').animate({left:"-=100%"},500);
	});
	
	$('.mobile-menu-button').click(function(){
		$(".hidden-mobile-navigation").css('left',$(window).width()).css('display','block').animate({left: 0},200);
	});
	
	$('.close-mobile-navigation').click(function(){
		$(".hidden-mobile-navigation").animate({left: $(window).width()},200);
		$(".hidden-mobile-navigation").promise().done(function(){ $(".hidden-mobile-navigation").css('display','none');	});
	});
	
});