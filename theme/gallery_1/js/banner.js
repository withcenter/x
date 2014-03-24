$(function(){
	var banner_num = 1;
	var no_of_images = $('.banner img').length;
	
	var banner_rotate_interval = setInterval(function(){
		rotate_the_banner();		
	},5000);
	
	$('.banner').mouseenter(function(){
		clearInterval(banner_rotate_interval);
	});
	
	$('.banner').mouseleave(function(){
		banner_rotate_interval = setInterval(function(){
			rotate_the_banner();		
		},5000);
	});
	
	$('.page_num').click(function() {
		banner_num = $(this).attr('page_num');
		clicked_banner( banner_num );
	});
	
	function rotate_the_banner(){			
		$('.banner-image-container').removeClass('selected');	
		if( banner_num == no_of_images ) banner_num = 0;
		banner_num++;
		var banner_page = ".image_"+banner_num;	
		$(banner_page).addClass('selected');
		$('.page_num').removeClass('selected_num');
		$('.page_'+banner_num).addClass('selected_num');
	}
	
	function clicked_banner( banner_num ) {
		$('.banner-image-container').removeClass('selected');
		$('.page_num').removeClass('selected_num');
		$('.image_'+banner_num).addClass('selected');
		$('.page_'+banner_num).addClass('selected_num');
	}
});