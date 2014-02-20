$(function() {
	/* config.php */
	$(".support .tab-menu .tab-button").click(function() {
		//$(".support .tab-menu .tab-button").removeClass('tab-button-selected'); --> 적용이 안 되는 듯 함.
		$(".support .tab-menu .tab-button").css("background-color", "#53749c");
		$(".support-content .inner").hide();
		//$(this).addClass('tab-button-selected'); --> 적용이 안 되는 듯함
		$(this).css("background-color", "#314258");
		
		var menu_name = $(this).attr('menu_name');
		$(".support-content ."+menu_name ).show();
	});
});