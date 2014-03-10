$(function(){
var hover_timeout;
var toggled = true;
var number;
	$(".post-image").mouseenter(function(){
	if( $(this).attr("number") == number ){
		clearTimeout(hover_timeout);
	}
		if( toggled == true ){
			number = $(this).attr("number");
			$(".other-images."+number).animate({width: 'toggle'},100);
			toggled = false;
		}
	});			
	
	$(".post-image").mouseleave(function(){
		hover_timeout = setTimeout(function(){
			$(".other-images."+number).hide();
			toggled = true;
		},200);
	});
	
	
});