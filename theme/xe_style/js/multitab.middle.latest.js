$(function(){
	$(".multitab-middle-latest .menu-tab li").click(function(){
		var menu_no = $(this).attr('menu');
		
		$menu_content = $(".multitab-middle-latest");
		$menu_content.find('.row').hide();
		$menu_content.find(".row[menu-content="+menu_no+"]").show();
	});
});