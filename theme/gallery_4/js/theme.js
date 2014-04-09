$(function(){
	$(".mobile-menu-button").click(function(){
		if ( $(".layout > .inner").hasClass("menu_open") ) $(".layout > .inner").removeClass("menu_open").css("left", 0);
		else $(".layout > .inner").addClass("menu_open").css("left", "220px");
		
		console.log('clicked');
	});
});