var curr_banner = 1;
var count = 1;

$(function(){	
	var animation_move;	
	var animation_time;
	var banner_interval;	
	var total_banner = $(".banner_container .banner").length - 2;
	
	$(".white_bg[banner_num='1']").addClass("enabled");
	$(".bullet[banner_num='1']").addClass("enabled");
	$(".tablet_control .control_button .stop").addClass("enabled");
	
	$(".bullet").click(function(){	
		if( $(".banner_container .inner2").is(":animated") ) return;
		
		if( $(window).width() > 657 ) animation_time = 500;
		else animation_time = 0;
		
		$(".tablet_control .bullet").removeClass("enabled");
		$(this).addClass("enabled");
		count = 1;
		
		total_move = curr_banner - $(this).attr("banner_num");
		if( total_move < 0 ) animation_move = "-=" + Math.abs(total_move)*100 + "%";
		else if( total_move > 0 ) animation_move = "+=" + total_move*100 + "%";
		else return;
		curr_banner = $(this).attr("banner_num");		
		
		$(".white_bg").removeClass("enabled");
		$(".white_bg[banner_num='" + curr_banner + "']").addClass("enabled");
		$(" .banner_container .inner2").animate({left:animation_move},animation_time);
		$(".tablet_control .bullet.enabled .time_limit").css("width", "12.5%");
	});
	
	$(".banner_arrow").click(function(){		
	if( $(".banner_container .inner2").is(":animated") ) return;
		if( $(this).hasClass("right") ){			
			if( $(window).width() > 657 ) animation_time = 500;
			else animation_time = 0;
		
			if( curr_banner == total_banner ){			
				animation_move = "+=" + ( ( total_banner - 1 ) * 100 ) + "%";
				curr_banner = 1;
			}
			else{
				animation_move = "-=100%";
				curr_banner++;
			}
			
			$(".white_bg").removeClass("enabled");
			$(".white_bg[banner_num='" + curr_banner + "']").addClass("enabled");
			$(" .banner_container .inner2").animate({left:animation_move},animation_time);
		}
		else if( $(this).hasClass("left") ){
			if( $(window).width() > 657 ) animation_time = 500;
			else animation_time = 0;
		
			if( curr_banner == 1 ){
				animation_move = "-=" + ( ( total_banner - 1 ) * 100 ) + "%";
				curr_banner = total_banner;
			}
			else{
				animation_move = "+=100%";
				curr_banner--;
			}
			
			$(".white_bg").removeClass("enabled");
			$(".white_bg[banner_num='" + curr_banner + "']").addClass("enabled");
			$(" .banner_container .inner2").animate({left:animation_move},animation_time);
		}
		
		$(".tablet_control .bullet").removeClass("enabled");
		$(".tablet_control .bullet[banner_num='" + curr_banner + "']").addClass("enabled");
		count = 1;
		$(".tablet_control .bullet.enabled .time_limit").css("width", "12.5%");
	});
	
	banner_interval = setInterval(function(){rotate_banner( total_banner )},1000);
	
	$(".tablet_control .control_button .stop").click(function(){
		clearInterval( banner_interval );
		$(".tablet_control .control_button .stop").removeClass("enabled");
		$(".tablet_control .control_button .play").addClass("enabled");
	});
	
	$(".tablet_control .control_button .play").click(function(){
		$(".tablet_control .control_button .play").removeClass("enabled");
		$(".tablet_control .control_button .stop").addClass("enabled");
		banner_interval = setInterval(function(){rotate_banner( total_banner )},1000);
	});

});

function rotate_banner( total_banner ){
	if( $(window).width() > 657 ) animation_time = 500;
	else animation_time = 0;

	if( count > 8 ){
		if( curr_banner == total_banner ) {
			curr_banner = 1
			animation_move = "+=" + ( ( total_banner - 1 ) * 100 ) + "%";
		}
		else{
			curr_banner++;
			animation_move = "-=100%";
		}
		count = 1;
		$(".white_bg").removeClass("enabled");
		$(".white_bg[banner_num='" + curr_banner + "']").addClass("enabled");
		$(" .banner_container .inner2").animate({left:animation_move},animation_time);			
		
		$(".tablet_control .bullet").removeClass("enabled");
		$(".bullet[banner_num='" + curr_banner + "']").addClass("enabled");			
	}
	$(".tablet_control .bullet.enabled .time_limit").css("width", count*12.5 + "%");		
	count++;	
}