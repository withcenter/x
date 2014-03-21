$(function(){
	var banner_rotator = setInterval( function() { rotate_the_banner() } , 1000 );
	var banner_num, left_value, page_num;
	var total_banners = $(".banner").attr("total_banners");
	
	/*banner rotation*/
	function rotate_the_banner() {
		$(".banner-image.selected").removeClass('selected').next().addClass('selected');
		$(".page_num.selected_num").removeClass('selected_num').next().addClass('selected_num');
		
		if( banner_num==total_banners ) {
			$(".banner-image").first().addClass('selected');
			$(".page_num").first().addClass('selected_num');
		}
		banner_num = $(".banner-image.selected").attr('image_num');
		left_value = -(((banner_num) * 968));
		if (banner_num == 1 ) {	
			$(".images-container").css('left',0);
		}
		$(".images-container").animate({left: left_value}, 500);
	}
	
	/*show banner information on hover ( subject, content, pagination, previous and next buttons) */
	$(".banner").mouseenter(function(){
		$(this).find('.banner-content').show();
		clearInterval(banner_rotator);
		page_num = $(this).find('.banner-image.selected').attr('image_num');
		previous_next_toggle( page_num );		
	});
	
	/*hide banner information*/
	$(".banner").mouseleave(function(){
		$(this).find('.banner-content').hide();
		banner_rotator = setInterval( function() { rotate_the_banner() } , 1000 );
		$(".next-banner").hide();
		$(".previous-banner").hide();		
	});
	
	/*pagination click()*/
	$(".page_num").click(function(){
		page_num = $(this).attr('page_num');
		current_num = $(".banner-pagination").find(".page_num.selected_num").attr("page_num");
		if ( page_num != current_num ) clicked_banner( page_num );
	});
	
	/*previous button*/
	$(".previous-banner").click(function() {
		page_num = $(".banner-pagination").find(".page_num.selected_num").attr("page_num");
		clicked_banner( page_num-1 );
	});
	
	/*next button*/
	$(".next-banner").click(function() {
		page_num = $(".banner-pagination").find(".page_num.selected_num").attr("page_num");
		clicked_banner( (parseInt(page_num)+1) );
	});
	
	/*pagination*/
	function clicked_banner( page_num ) {
		$(".banner-image.selected").removeClass('selected');
		$(".page_num.selected_num").removeClass('selected_num');
		$(".page_"+page_num).addClass('selected_num');
		$(".image_"+page_num).addClass('selected');
		$('.banner-content').fadeOut();
		$(".images-container").animate({left: -((page_num) * 968)}, 500).find('.banner-content').fadeIn();
		previous_next_toggle( page_num );
	}
	
	/*previous and next button ( show and hide ) conditions*/
	function previous_next_toggle( page_num ) {

		if( page_num == 1 ) {
			$(".next-banner").show();
			$(".previous-banner").hide();
		} else if ( page_num == total_banners ) {
			$(".next-banner").hide();
			$(".previous-banner").show();		
		}
		else {
			$(".next-banner").show();
			$(".previous-banner").show();			
		}	
	}
});