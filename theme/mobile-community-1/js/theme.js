$(function(){
	$('#login-button').click(function(){
		if ( $('#login-box').css('display') == 'none' ) $('#login-box').show();
		else $('#login-box').hide();
	});	

	$('#header .menu ul li.menu_item a').click(function(){	
		$('#header .menu ul li.menu_item a').removeClass('selected');
		$(this).addClass('selected');				
	});
	
	$('#header .menu ul li.log-in-button a').click(function(){		
		$('.pop-up-login').toggle();		
	});
});


function open_menu()
{
	$('.menu').slideDown('fast');
	$('.all-menu').show();
}

function close_menu()
{
	$('.menu').slideUp('fast');
	$('.all-hide').show();
}
