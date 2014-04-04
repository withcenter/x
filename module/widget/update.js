$(function(){
	$('.widget-extra-button').click(function(){
		var text;
		var display = $('.widget-extra').css('display');
		if ( display == 'none' ) text = 'CLOSE';
		else text = 'OPEN';
		
		$(".config form [name='widget-extra-display']").val( text );
		
		$('.widget-extra-button span').text( text );
		$('.widget-extra').toggle('fast');
	});
});