$(function(){
	$(".multi-tab-latest .tab-menu li a").prop('href', 'javascript:void(0)');
	
	$(".multi-tab-latest .tab-menu  li[tab-menu='menu0']").addClass("tab-selected");
	$(".multi-tab-latest .tab-menu  li[tab-menu='menu0']").children().addClass('tab-selected-text');
	
	
	$(".multi-tab-latest .tab-menu li").click(function() {
		$(".multi-tab-latest .tab-menu li").removeClass('tab-selected');
		$(".multi-tab-latest .tab-menu li").children().removeClass('tab-selected-text');
		
		$(".multi-tab-latest .tab-submenu-content").hide();
		
		$(this).addClass('tab-selected');
		$(this).children().addClass('tab-selected-text');
		
		var tab_menu = $(this).attr("tab-menu");
		$(".multi-tab-latest .tab-submenu-content[tab-submenu='"+tab_menu+"']").show();
	});
});