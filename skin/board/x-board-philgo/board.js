$(function(){
	$(".post-image").mouseenter(function(){
		number = $(this).attr("number");
		$(".other-images[number='"+number+"']").animate({width: 'show'},100);
	});			

	
	$(".post-image").mouseleave(function(){		
		$(".other-images[number='"+number+"']").hide();		
	});
	
	
});