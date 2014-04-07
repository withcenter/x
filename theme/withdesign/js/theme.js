$(function(){
	var template_name;
	
	$(".contact-us .template_contactus").mouseenter(function(){
		if ( !$(this).find('.selected-template').hasClass('selected') ) $(this).find('.view-template').show().siblings('.template_name').hide();
	});
	
	$(".contact-us .template_contactus").mouseleave(function(){
		if ( !$(this).find('.selected-template').hasClass('selected') ) $(this).find('.view-template').hide().siblings('.template_name').show();
	});
	
	$(".contact-us .template_contactus").click(function(){
		template_name = $(this).find('.template_name').attr('template_name');
		$(".template_name_field").val(template_name);
		$(".selected-template").removeClass('selected');
		$(this).find('.selected-template').addClass('selected');
		$('.view-template').hide();
	});
	
	$(".cancel_template").click(function(){
		$("form#fwrite").trigger('reset');
	});
});