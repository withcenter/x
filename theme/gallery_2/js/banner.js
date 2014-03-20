$(function(){
	var banner_rotator = setInterval( function() { rotate_the_banner() } , 1000 );
	
	var banner_num;
	var left_value;
	function rotate_the_banner() {
		$(".banner-image.selected").removeClass('selected').next().addClass('selected');
		if( banner_num==5 ) $(".banner-image").first().addClass('selected');
		banner_num = $(".banner-image.selected").attr('image_num');
		if ( banner_num == 1 ) left_value = 0;
		else left_value = -((banner_num-1) * 968);
		$(".banner-image").animate({left: left_value}, 500);
	}
	
	$(".banner-image").mouseenter(function(){
		$(this).find('.banner-content').show();
		clearInterval(banner_rotator);
	});
	
	$(".banner-image").mouseleave(function(){
		$(this).find('.banner-content').hide();
		banner_rotator = setInterval( function() { rotate_the_banner() } , 1000 );
	});
	
});