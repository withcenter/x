$(function(){
	$(".multi-tab-latest .tab-menu li a").prop('href', 'javascript:void(0)');
	
	$(".multi-tab-latest .tab-menu li").click(function() {
		$(this).addClass('tab-selected');
	});
});