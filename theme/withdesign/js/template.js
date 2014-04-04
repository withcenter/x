$(function(){
	$(".template").mouseenter(function() {
		$(this).find('.template_name').show();
	});
	$(".template").mouseleave(function() {
		$(this).find('.template_name').hide();
	});
});