var banner_count = 0;
var curr_banner = 1;
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
	
/***************BANNER_CLICK******************/	
	banner_count = $(".banner-container .banner img").length -2;
	
	var total_width_percentage = 100 * banner_count;	
	$(".banner-container .banner img[banner_num='" + curr_banner + "']").addClass('selected_banner');
	
	$('.left_btn').click(function(){				
		if( !$('.banner').is(':animated') ){
			$(".banner-container .banner img[banner_num='" + curr_banner + "']").removeClass('selected_banner');
		
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").hide();
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").show();
			if( curr_banner == 1 ) curr_banner = banner_count;
			else curr_banner--;
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").hide();
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").show();
			
			$(".banner-container .banner img[banner_num='" + curr_banner + "']").addClass('selected_banner');						
						
			$('.banner').animate({left:"+=100%"},300);
		}
		
		$('.banner').promise().done(function(){			
			if( curr_banner == 3 )
			$('.banner').css("left", "-" + total_width_percentage + "%");
		});
		console.log(curr_banner);
	});
	
	$('.right_btn').click(function(){		
		if( !$('.banner').is(':animated') ){
			$(".banner-container .banner img[banner_num='" + curr_banner + "']").removeClass('selected_banner');
			
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").hide();
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").show();
			if( curr_banner == banner_count ) curr_banner = 1;
			else curr_banner++;
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").hide();
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").show();
			
			$(".banner-container .banner img[banner_num='" + curr_banner + "']").addClass('selected_banner');						
						
			$('.banner').animate({left:"-=100%"},300);
		}
		
		$('.banner').promise().done(function(){			
			if( curr_banner == 1 )
			$('.banner').css("left","-100%");
		});
		console.log(curr_banner);
	});
	
/***************BANNER_CLICK_BULLET******************/

	$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").show();
	$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").hide();
	
	$(".lower_commands .bullet").click(function(){
		clearInterval(banner_interval);
		var move_to = ( curr_banner - $(this).attr('banner_num') ) * 100;
		
		if( move_to < 0 ) move_to = "-="+Math.abs(move_to)+"%";
		else move_to = "+="+Math.abs(move_to)+"%";
		
		$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").hide();
		$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").show();
		curr_banner = $(this).attr('banner_num');	
		$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").hide();
		$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").show();
		
		$('.banner').animate({left:move_to},300);
		
		 banner_interval = setInterval(function(){
			do_rotate();
		},4000);
	});
	
/***************BANNER_ROTATION******************/
	var stopped = false;

	var banner_interval = setInterval(function(){
		do_rotate();
	},4000);
	
	$('.banner-container').mouseenter(function(){		
		clearInterval(banner_interval);
	});
	
	$('.banner-container').mouseleave(function(){
		clearInterval(banner_interval);
		if( !stopped ){
			 banner_interval = setInterval(function(){
				do_rotate();
			},4000);
		}
	});
	
	$('.stop_btn').addClass('shown');
	
	$('.stop_btn').click(function(){		
		stopped = true;
		$('.stop_btn').removeClass('shown');
		$('.play_btn').addClass('shown');
		clearInterval(banner_interval);
	});
	
	$('.play_btn').click(function(){		
		stopped = false;
		$('.play_btn').removeClass('shown');
		$('.stop_btn').addClass('shown');
		banner_interval = setInterval(function(){
			do_rotate();
		},4000);
	});
});

function do_rotate(){
	if( !$('.banner').is(':animated') ){
		$(".banner-container .banner img[banner_num='" + curr_banner + "']").removeClass('selected_banner');
		
		$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").hide();
			$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").show();
		if( curr_banner == banner_count ) curr_banner = 1;
		else curr_banner++;
		$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .off").hide();
		$(".lower_commands .bullet[banner_num='" + curr_banner + "'] .on").show();
				
		$(".banner-container .banner img[banner_num='" + curr_banner + "']").addClass('selected_banner');						
					
		$('.banner').animate({left:"-=100%"},300);
	}
	
	$('.banner').promise().done(function(){			
		if( curr_banner == 1 )
		$('.banner').css("left","-100%");
	});
}