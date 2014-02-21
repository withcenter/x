$(function(){
	var page_num = 1;
	
	$('.image_num_1').addClass('selected');

	
	var banner_rotate_interval = setInterval(function(){
		rotate_the_banner();		
	},5000);
	
	$('.banner').mouseover(function(){
		clearInterval(banner_rotate_interval);
	});
	
	$('.banner').mouseout(function(){
	
		banner_rotate_interval = setInterval(function(){
			rotate_the_banner();		
		},5000);
	
	});
	
	function rotate_the_banner(){			
		$('.banner-image').removeClass('selected');	
		$(".pages").removeClass('selected');
		
		if( page_num == 5 )page_num = 0;
		page_num++;
		var banner_page = ".image_num_"+page_num;
		
		if( $( banner_page ).length){console.log('page: '+banner_page);}
		else rotate_the_banner();
				
		$(banner_page).addClass('selected');
		$("[image_meta_num='"+page_num+"'").addClass('selected');
	}
});