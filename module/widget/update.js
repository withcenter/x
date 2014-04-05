$(function(){

	/// extra button
	$('.widget-extra-button').click(function(){
		var text;
		var display = $('.widget-extra').css('display');
		if ( display == 'none' ) text = 'CLOSE';
		else text = 'OPEN';
		
		$(".config form [name='widget-extra-display']").val( text );
		
		$('.widget-extra-button span').text( text );
		$('.widget-extra').toggle('fast');
		resize_popup_layer();
	});
	
	///
	$('.item.forum select').change( function() {
		var val = $(this).val();
		$(this).parent().find("input[type='text']").val( val );
	});
	
	
	/// widget help button
	$(".widget-help").click(function(){
		var name = $(this).parent().find("[name='name']").val();
		var url = "?module=widget&action=ajax_get_detail_submit&name="+name;
		ajax_load( url, callback_widget_help );
	});
	
	
	/// widget selection
	$(".widget-close").click(function(){
		$('.widget-list').slideUp('fast');
		$(".widget-close").hide();
		$(".widget-open").show();
		resize_popup_layer();
	});
	
	$(".widget-open").click(function(){
		$("input[name='name']").click();
	});
	
	$("input[name='name']").click(function(){
		$('.widget-list').slideDown('fast');
		$(".widget-open").hide();
		$(".widget-close").show();
		resize_popup_layer();
	});
	$('.a-widget').click(function(){
		var text = $(this).find('.folder').text();
		$("input[name='name']").val( text );
		$(".widget-close").click();
	});
	
	
	window.onload = resize_popup_layer;
	function resize_popup_layer()
	{
		setTimeout( post_message_height, 300 );
		setTimeout( post_message_height, 1500 );
		setTimeout( post_message_height, 3500 );
	}
	function post_message_height()
	{
		var height = $('body').height() + 40 ;
		var data = { 'code' : 'popup_layer_resize', 'height' : height };
		parent.postMessage( data, '*' );
	}
	
});

function callback_widget_help( data )
{
	alert( data );
}

	