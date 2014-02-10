var submenu_up_timer;
var submenu_show_timer;

$(function() {
	$("#gnb .gnb_1dli").mouseenter(function() {
		var menu_id = $(this).attr('menu');
		$position  = $(this).position();
		if ( typeof menu_id != 'undefined') {
			submenu_show_timer = setTimeout(function() {
				var xpos = $position.left;
				var ypos = $position.top + 40;
				$("[submenu="+menu_id+"]").css('left', xpos+"px").css('top', ypos + "px").show();
			}, 500);
		}
	});
	
	$("#gnb .gnb_1dli").mouseleave(function() {
		clearTimeout(submenu_show_timer);
		submenu_up_timer = setTimeout(function() {
			$("#gnb .gnb_submenu").slideUp();
		}, 500);
	});
	
	$("#gnb .gnb_submenu").mouseenter(function() {
		clearTimeout(submenu_up_timer);
	});
	
	$("#gnb .gnb_submenu").mouseleave(function() {
		$("#gnb .gnb_submenu").slideUp();
	});
});