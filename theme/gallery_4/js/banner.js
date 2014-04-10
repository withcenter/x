$(function(){
	var curr_banner = 1;
	var total_banner = $(".banner_container .banner").length - 2;
	var animation_move;	
	console.log(total_banner);
	$(".white_bg[banner_num='1'").addClass("enabled");
	
	$(".bullet").click(function(){		
		if( $(".banner_container .inner2").is(":animated") ) return;
		total_move = curr_banner - $(this).attr("banner_num");
		if( total_move < 0 ) animation_move = "-=" + Math.abs(total_move)*100 + "%";
		else if( total_move > 0 ) animation_move = "+=" + total_move*100 + "%";
		else return;
		curr_banner = $(this).attr("banner_num");		
		
		$(".white_bg").removeClass("enabled");
		$(".white_bg[banner_num='" + curr_banner + "'").addClass("enabled");
		$(" .banner_container .inner2").animate({left:animation_move},500);
	});
	
	$(".banner_arrow").click(function(){
	if( $(".banner_container .inner2").is(":animated") ) return;
		if( $(this).hasClass("right") ){
			if( curr_banner == total_banner ){
				animation_move = "+=" + ( ( total_banner - 1 ) * 100 ) + "%";
				curr_banner = 1;
			}
			else{
				animation_move = "-=100%";
				curr_banner++;
			}
			
			$(".white_bg").removeClass("enabled");
			$(".white_bg[banner_num='" + curr_banner + "'").addClass("enabled");
			$(" .banner_container .inner2").animate({left:animation_move},500);
		}
		else if( $(this).hasClass("left") ){
			console.log("left");
			if( curr_banner == 1 ){
				animation_move = "-=" + ( ( total_banner - 1 ) * 100 ) + "%";
				curr_banner = total_banner;
			}
			else{
				animation_move = "+=100%";
				curr_banner--;
			}
			
			$(".white_bg").removeClass("enabled");
			$(".white_bg[banner_num='" + curr_banner + "'").addClass("enabled");
			$(" .banner_container .inner2").animate({left:animation_move},500);
		}
	});
});