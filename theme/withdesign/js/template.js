$(function(){

	$(".template").mouseenter(function() {
		$(this).find('.template_name').show();
	});
	$(".template").mouseleave(function() {
		$(this).find('.template_name').hide();
	});
	
	var template_name, imgsrc, demo_link;
	
	$(".template_name").click(function() {
		template_name = $(this).attr('template_name');
		imgsrc = $(this).siblings('img').attr('src');
		demo_link = $(this).find('a').attr('href');
		$(".popup-preview").find(".popup-image").attr("src", imgsrc);
		$(".popup-preview").find(".popup-title").html(template_name);
		$(".popup-preview").find(".popup-demo-link").attr("href", demo_link);
		$(".popup-preview").css('display','block');
		$('html, body').animate({scrollTop:$('#portfolio').position().top}, 0);
	});
	
	$(".popup-close").click(function() {
		$(".popup-preview").css('display','none');
	});
	
	$(".menu_portfolio").click(function() {
		$('html, body').animate({scrollTop:$('#portfolio').position().top-98}, 'slow');
	});
	
	$(".menu_services").click(function() {
		$('html, body').animate({scrollTop:$('#services').position().top-98}, 'slow');
	});

	$(".menu_contact_us").click(function() {
		$('html, body').animate({scrollTop:$('#contact-us').position().top-98}, 'slow');
	});

	$(".menu_support").click(function() {
		$('html, body').animate({scrollTop:$('#support').position().top-98}, 'slow');
	});	
	
});