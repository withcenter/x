$(function(){
	var page_num = 1;
	var total_page = 0;
	
	$('.image_num_1').addClass('selected');
	$("[image_meta_num='1'").addClass('selected');
	
	for (var ctr = 1; ctr<=5 ; ctr++){
		if($("[image_meta_num='"+ctr+"'").length){
			total_page++;
		}
	}
	
	if( total_page <= 1 ){
		return;
	}
	
	$('.pages').click(function(){
		page_num = $(this).attr('image_meta_num');
		var banner_page = ".image_num_"+page_num;	
		
		$('.banner-image').removeClass('selected');
		$("[image_meta_num='"+page_num+"'").removeClass('selected');
				
		$(banner_page).addClass('selected');
		$("[image_meta_num='"+page_num+"'").addClass('selected');
	});
	
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
		$("[image_meta_num='"+page_num+"'").removeClass('selected');
		
		if( page_num == total_page )page_num = 0;
		page_num++;
		var banner_page = ".image_num_"+page_num;
		
		if( $( banner_page ).length){console.log('page: '+banner_page);}
		else rotate_the_banner();
				
		$(banner_page).addClass('selected');
		$("[image_meta_num='"+page_num+"'").addClass('selected');
	}
});