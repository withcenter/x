$(function(){

	$('li.active-page').parent().css('display','block');
	$('li.active-page').parent().parent('li').addClass('current');

	$('li.name').mouseenter(function(){
		$(this).addClass('selected');
		$('li.active-page').parent().css('display','none');
		$('li.selected > ul.submenu').css('display','block');
		$('li.active-page').parent().parent('li').removeClass('current');
	});
	
	$('li.name').mouseleave(function(){
		$(this).removeClass('selected');
		$('ul.submenu li').parent().css('display','none');
		$('li.active-page').parent().parent('li').addClass('current');
		$('li.active-page').parent().css('display','block');
	}); 

});







