$(function(){
	$(".gallery_item[banner_num='1']").addClass('current_banner');
	var total_banners = $(".gallery_item").length;					
	var curr_banner = $(".gallery_item.current_banner").attr("banner_num");
	$(".bullet[banner_num='1'] img[status='on']").show();
	$(".bullet[banner_num='1'] img[status='off']").hide();
	
	$(".arrow.left").click(function(){
		if( $(".gallery_container .inner_wrapper").is(':animated') ) return;
		if( curr_banner == 1 ) return;
		
		curr_banner--;
		$(".gallery_container .inner_wrapper").animate({left:"+=100%"},500);
		bullet_highlight( curr_banner );
	});
				
	$(".arrow.right").click(function(){
		if( $(".gallery_container .inner_wrapper").is(':animated') ) return;
		if( curr_banner == total_banners ) return;
		
		curr_banner++;
		$(".gallery_container .inner_wrapper").animate({left:"-=100%"},500);
		bullet_highlight( curr_banner );
	});
				
	
	$(".bullet").click(function(){
		if( $(".gallery_container .inner_wrapper").is(':animated') ) return;
		bullet_num = $(this).attr('banner_num');				
		total_movement = curr_banner - bullet_num;
		
		bullet_highlight( bullet_num )
		if( total_movement > 0 ){
			animation_movement = "+=" + total_movement * 100 + "%";					
		}
		else if( total_movement < 0 ){
			animation_movement = "-=" + Math.abs(total_movement) * 100 + "%";
		}
		else return;
		
		$(".gallery_container .inner_wrapper").animate({left:animation_movement},500);
		curr_banner = bullet_num;
	});
	
});

function bullet_highlight( banner_number ){			
	$(".bullet img[status='off']").show();
	$(".bullet img[status='on']").hide();		
	$(".bullet[banner_num='" + banner_number + "'] img[status='on']").show();
	$(".bullet[banner_num='" + banner_number + "'] img[status='off']").hide();
}