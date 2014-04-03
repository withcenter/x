$(function(){
	var total_links = $(".inner-footer-links .menu-links ul li").length;
	var max_rows, columns, current_row = 1;
	
	footer_max_rows();
	
	$(".prev-nav .footer-prev").click(function(){
		if ( current_row != 1 ) { 
			$('.inner-footer-links .menu-links ul').animate({top: "+=21px"}, 150);
			current_row--;
		}
	});
	
	$(".prev-nav .footer-next").click(function(){
		footer_max_rows();
		if ( current_row != max_rows ) {
			$('.inner-footer-links .menu-links ul').animate({top: "-=21px"}, 150);
			current_row++;
		}
	});
	
	$(".footer-view").click(function(){
		$(".site-title, .menu-links, .prev-nav, .footer-full-links, .footer-view-clicked").toggle();
		$(".footer-links").addClass('selected').find(".inner-footer-links").addClass('clicked').find(".footer-links").css('background','#2d3b64');
		$(".clicked_info").css('display','block');
		window.scrollTo(0, document.body.scrollHeight);
	});
	
	$(".footer-view-clicked").click(function(){
		$(".site-title, .menu-links, .prev-nav, .footer-full-links, .footer-view-clicked").toggle();
		$(".footer-links").removeClass('selected').find(".inner-footer-links").removeClass('clicked').find(".footer-links").css('background','#47547a');
		$(".clicked_info").css('display','none');
		window.scrollTo(0, document.body.scrollHeight);
	});
	
	$(".open-footer").click(function(){
		$('html body').animate({scrollTop: 0},0);
		$(".footer-full-links").css('left',$(window).width()).css('display','block').css('height', $('html body').height()).animate({left: 0},200);
	});
	
	$('.close_mobile_footer').click(function(){
		$(".footer-full-links").animate({left: $(window).width()},200);
		$(".footer-full-links").promise().done(function(){ $(".footer-full-links").css('display','none').css('height','100%');	});
	});
	
	function footer_max_rows() {
		if ( window.innerWidth > '1000' ) columns = 5;
		else if ( window.innerWidth > '865' ) columns = 4;
		else columns = 3;
		max_rows = Math.floor(total_links / columns);
		if ( (total_links % columns) > 0 ) max_rows++;
	};
	
	

});

	
