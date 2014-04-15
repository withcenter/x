$(function(){
	var timer_menu_out = 0;
	$(".admin-menu > ul > li > a").mouseenter(function(){
		if ( timer_menu_out ) clearTimeout( timer_menu_out );
		$('.select-sub-menu').removeClass('select-sub-menu');
		$('.admin-menu > ul > li > .selected + .sub-menu').hide();
		
		if ( $(this).hasClass('selected') ) $(this).next().show();
		$(this).next().addClass('select-sub-menu');
	});
	$(".admin-menu > ul > li > a").mouseleave(function(){
		$this = $(this);
		timer_menu_out = setTimeout(function(){
			$this.next().removeClass('select-sub-menu');
			$('.admin-menu > ul > li > .selected + .sub-menu').show();
			},
			500);
	});
	$(".sub-menu").mouseenter(function(){
		if ( $(this).prev().hasClass('selected') ) return;
		if ( timer_menu_out ) clearTimeout( timer_menu_out );
	});
	$(".sub-menu").mouseleave(function(){
		$this = $(this);
		timer_menu_out = setTimeout(function(){
			$this.removeClass('select-sub-menu');
			$('.admin-menu > ul > li > .selected + .sub-menu').show();
			},
			500);
	});
});
