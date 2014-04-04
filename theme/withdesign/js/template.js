$(function(){
	$(".template-preview .template").mouseenter(function() {
		$(this).find('.template_name').show();
	});
	$(".template-preview .template").mouseleave(function() {
		$(this).find('.template_name').hide();
	});
});