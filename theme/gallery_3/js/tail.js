$(function(){
	var total_links = $(".inner-footer-links .menu-links ul li").length;
	var max_rows = Math.floor(total_links / 5);
	var current_row = 1;
	if ( (total_links % 5) > 0 ) max_rows++;
	
	$(".prev-nav .footer-prev").click(function(){
		if ( current_row != 1 ) { 
			$('.inner-footer-links .menu-links ul').animate({top: "+=21px"}, 150);
			current_row--;
		}
	});
	
	$(".prev-nav .footer-next").click(function(){
		if ( current_row != max_rows ) {
			$('.inner-footer-links .menu-links ul').animate({top: "-=21px"}, 150);
			current_row++;
		}
	});
});