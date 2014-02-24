$(function(){
	var banner_num = 1;
	
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
	
	function rotate_the_banner(){			
		$('.banner-image').removeClass('selected');	
		if( banner_num == 5 ) banner_num = 0;
		banner_num++;
		var banner_page = ".image_num_"+banner_num;	
		$(banner_page).addClass('selected');
	}
});