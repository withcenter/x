$(function() {
	/* config.php */
	$(".support .tab-menu .tab-button").click(function() {
		//$(".support .tab-menu .tab-button").removeClass('tab-button-selected'); --> 적용이 안 되는 듯 함.
		//$(".support .tab-menu .tab-button").css("background-color", "#53749c");
		$(".support-content .inner").hide();
		//$(this).addClass('tab-button-selected'); --> 적용이 안 되는 듯함
		//$(this).css("background-color", "#314258");
		
		var menu_name = $(this).attr('menu_name');
		$(".support-content ."+menu_name ).show();
		$(".support span").removeClass('tab-button-selected');
		$("span[menu_name='"+menu_name+"']").addClass('tab-button-selected');
	});
	
	/*config_theme.php*/
	$(".theme-thumb.inactive").click(function() {
		$confirm = confirm('Do you really want to change Theme?');
		if( $confirm == true ) {
			var theme_val = $(this).attr('theme_value');
			$("#theme_value").val(theme_val);
			$(".config_theme").submit();
		}
	});
	
var page;
var show_hide = 0;
var document_name;

	/* append/add the google doc iframe once if show span is clicked */
	$('span.user-google-guide-button').click(function(){
	
		$(this).empty();
		if( show_hide == 0 ) {
			$(this).append("[hide]");
			show_hide = 1;
		}
		else {
			$(this).append("[show]");
			show_hide = 0;
		}
		
		page = $(this).attr('page');	
		document_name = $(this).attr('document_name');
		
		if ( ($(".hidden-google-doc."+page).hasClass('has-iframe')) == false ) {
			$(".hidden-google-doc."+page).append("<div>필고 사이트 서비스 설명서:</div><iframe src='"+document_name+"' style='width:99.5%; height: 400px;'></iframe>");
			$(".hidden-google-doc."+page).addClass('has-iframe');
		}
		
		$(".hidden-google-doc."+page).toggle();		
	});	
});