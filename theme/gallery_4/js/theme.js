$(function(){
	$(".mobile-menu-button").click(function(){
		if ( $(".layout").hasClass("menu_open") ) $(".layout").removeClass("menu_open").css("left", 0);
		else $(".layout").addClass("menu_open").css("left", "220px");
	});
});