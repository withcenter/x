$(function(){
	$('.skin-update').mouseenter(function(){
		$(this).find('.skin-update-button').show();
	});
	
	$('.skin-update').mouseleave(function(){
		$(this).find('.skin-update-button').hide();
	});
	
	$('.skin-update-button').click(function() {
		var code = $(this).attr('code');
		var url = g5_url + '/x/?module=skin&action=update&theme=n&code=' + code;
		layer_popup( url, 1, '680', '520');
	});
	
});