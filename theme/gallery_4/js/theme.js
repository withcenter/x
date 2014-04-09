$(function(){
	$(".mobile-menu-button").click(function(){
		if ( $(".layout > .inner").hasClass("menu_open") ) $(".layout > .inner").removeClass("menu_open").css("left", 0);
		else $(".layout > .inner").addClass("menu_open").css("left", "220px");
		
		console.log('clicked');
	});
	
	var image_menu_name;
	$(".image-menu-name").click(function(){
		image_menu_name = $(this).attr('menu_name');
		$(".image-menu-name .inner").removeClass('selected');
		$(this).find('.inner').addClass('selected');
		$(".post-full-image."+image_menu_name).addClass('selected').siblings('.post-full-image').removeClass('selected');
	});
});