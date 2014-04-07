$(function(){
	var timer_menu_out = 0;
	$(".main-menu > li > a").mouseenter(function(){
		if ( timer_menu_out ) clearTimeout( timer_menu_out );
		$('.select-sub-menu').removeClass('select-sub-menu');
		$(this).next().addClass('select-sub-menu');
	});
	$(".main-menu > li > a").mouseleave(function(){
		$this = $(this);
		timer_menu_out = setTimeout(function(){
			$this.next().removeClass('select-sub-menu');
			},
			500);
	});
	$(".sub-menu").mouseenter(function(){
		if ( timer_menu_out ) clearTimeout( timer_menu_out );
	});
	$(".main-menu > li > a").mouseleave(function(){
		$this = $(this);
		timer_menu_out = setTimeout(function(){
			$this.removeClass('select-sub-menu');
			},
			500);
	});
	
});
