var is_animating = false;
var about_to_move = false;
var has_animated = false;

$(function(){
	$(".gallery_item[banner_num='1']").addClass('current_banner');
	var total_banners = $(".gallery_item").length;					
	var curr_banner = $(".gallery_item.current_banner").attr("banner_num");	
	$(".bullet[banner_num='1'] img[status='on']").show();
	$(".bullet[banner_num='1'] img[status='off']").hide();
	
	$(".arrow.left").click(function(){
		if( $(".gallery_container .inner_wrapper").is(':animated') ) return;				
		
		if( curr_banner == 1 ) return;			
		
		if( is_animating == true ){			
			instant_banner_exit_animation( bullet_num );		
		}		
		
		if ( about_to_move == true ) return;
		about_to_move = true;
		
		if( has_animated == true && curr_banner > 2 ){			
			banner_exit_animation( curr_banner );		
			is_animating = false;
		}						
		
		$(".gallery_container .gallery_item .inner img[banner_num='" + curr_banner + "']").promise().done(function(){
			$(".gallery_container .inner_wrapper").animate({left:"+=100%"},500);			
			is_animating = false;
			curr_banner--;
			bullet_num = curr_banner;
			bullet_highlight( curr_banner );
			
			/*enter animation*/
			$(".gallery_container .inner_wrapper").promise().done(function(){
				is_animating = true;
				banner_enter_animation( curr_banner );
				if( curr_banner > 2 )
				has_animated = true;								
				about_to_move = false;
			})	
		})
	});
				
	$(".arrow.right").click(function(){
		if( $(".gallery_container .inner_wrapper").is(':animated') ) return;				
		
		if( curr_banner == total_banners ) return;			
		
		if( is_animating == true ){			
			instant_banner_exit_animation( bullet_num );		
		}		
		
		if ( about_to_move == true ) return;
		about_to_move = true;
		
		if( has_animated == true && curr_banner > 2 ){
			banner_exit_animation( curr_banner );		
			is_animating = false;
		}						
		
		$(".gallery_container .gallery_item .inner img[banner_num='" + curr_banner + "']").promise().done(function(){
			$(".gallery_container .inner_wrapper").animate({left:"-=100%"},500);			
			is_animating = false;
			curr_banner++;
			bullet_num = curr_banner;
			bullet_highlight( curr_banner );
			
			/*enter animation*/
			$(".gallery_container .inner_wrapper").promise().done(function(){
				is_animating = true;
				banner_enter_animation( curr_banner );
				if( curr_banner > 2 )
				has_animated = true;								
				about_to_move = false;
			})	
		})
	});
		
	var bullet_num = 0;
	
	$(".bullet").click(function(){
		if( bullet_num == $(this).attr('banner_num') ) {				
			return;					
		}
		
		if( $(".gallery_container .inner_wrapper").is(':animated') ) return;
		
		if( is_animating == true ){			
			instant_banner_exit_animation( bullet_num );		
		}
		
		if ( about_to_move == true ) return;
		about_to_move = true;		
		
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
		if( has_animated == true ){
			banner_exit_animation( curr_banner );		
			is_animating = false;
		}		
		
		$(".gallery_container .gallery_item .inner img[banner_num='" + curr_banner + "']").promise().done(function(){			
				$(".gallery_container .inner_wrapper").animate({left:animation_movement},500);
				curr_banner = bullet_num;			
				is_animating = false;

				/*enter animation*/
				$(".gallery_container .inner_wrapper").promise().done(function(){
					is_animating = true;
					banner_enter_animation( curr_banner );
					has_animated = true;
									
					about_to_move = false;
				})					
		});				
	});
	
});

function bullet_highlight( banner_number ){			
	$(".bullet img[status='off']").show();
	$(".bullet img[status='on']").hide();		
	$(".bullet[banner_num='" + banner_number + "'] img[status='on']").show();
	$(".bullet[banner_num='" + banner_number + "'] img[status='off']").hide();
}

/*enter animation*/
function banner_enter_animation( banner_number ){
if( banner_number < 2 ) return;	
	$(".gallery_container .gallery_item .inner .button1[banner_num='" + banner_number + "']").animate({bottom:"20%"},300);
	$(".gallery_container .gallery_item .inner .button1[banner_num='" + banner_number + "']").promise().done(function(){
		$(".gallery_container .gallery_item .inner .button2[banner_num='" + banner_number + "']").animate({left:"76%"},300);
			$(".gallery_container .gallery_item .inner .button2[banner_num='" + banner_number + "']").promise().done(function(){
				$(".gallery_container .info[banner_num='" + banner_number + "']").animate({right:"0"},300);
					$(".gallery_container .info[banner_num='" + banner_number + "']").promise().done(function(){
						$(".gallery_container .gallery_item .inner img[banner_num='" + banner_number + "']").animate({left:"0"},300);
							$(".gallery_container .gallery_item .inner img[banner_num='" + banner_number + "']").promise().done(function(){
								is_animating = false;								
							});
					});
			});						
	});	
}

function banner_exit_animation( banner_number ){
if( banner_number < 2 ) return;	
	$(".gallery_container .gallery_item .inner .button1[banner_num='" + banner_number + "']").animate({bottom:"+=100%"},500);
	$(".gallery_container .gallery_item .inner .button2[banner_num='" + banner_number + "']").animate({left:"+=100%"},500);
	$(".gallery_container .info[banner_num='" + banner_number + "']").animate({right:"+=100%"},500);
	$(".gallery_container .gallery_item .inner img[banner_num='" + banner_number + "']").animate({left:"+=150%"},500);	
	
	/*resets the position*/
	$(".gallery_container .gallery_item .inner .button2[banner_num='" + banner_number + "']").promise().done(function(){
		$(".gallery_container .gallery_item .inner .button1[banner_num='" + banner_number + "']").animate({bottom:"-20%"},0);
		$(".gallery_container .gallery_item .inner .button2[banner_num='" + banner_number + "']").animate({left:"-75%"},0);
		$(".gallery_container .info[banner_num='" + banner_number + "']").animate({right:"-100%"},0);
		$(".gallery_container .gallery_item .inner img[banner_num='" + banner_number + "']").animate({left:"-100%"},0);
	});
}

function instant_banner_exit_animation( banner_number ){
	/*instantly finishes the animation*/
	$(".gallery_container .gallery_item .inner .button1[banner_num='" + banner_number + "']").finish();	
	$(".gallery_container .gallery_item .inner .button2[banner_num='" + banner_number + "']").finish();
	$(".gallery_container .info[banner_num='" + banner_number + "']").finish();
	$(".gallery_container .gallery_item .inner img[banner_num='" + banner_number + "']").finish();	
}