$(function(){
	$('#login-button').click(function(){
		if ( $('#login-box').css('display') == 'none' ) $('#login-box').show();
		else $('#login-box').hide();
	});	

	$('#header ul li.menu_item a').click(function(){	
	if( $(this).hasClass('selected') ){
			$('#header ul li.menu_item a').removeClass('selected');
	}else{
			$('#header ul li.menu_item a').removeClass('selected');
			$(this).addClass('selected');				
			$('#header .pop-up').hide();
		}
	});
	
	$('#header ul li.menu_item.drop-down-button a').click(function(){			
		$('.mobile-menu .drop-down').toggle();
	});
	
	$('#header .menu ul li.log-in-button a').click(function(){		
		$('.menu .pop-up-login').toggle();		
	});
	
	$('#header .mobile-menu ul li.log-in-button a').click(function(){		
		$('.mobile-menu .pop-up-login').toggle();	
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
