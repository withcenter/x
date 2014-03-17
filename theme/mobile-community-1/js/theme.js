$(function(){
/*
	$('#login-button').click(function(){
		if ( $('#login-box').css('display') == 'none' ) $('#login-box').show();
		else $('#login-box').hide();
	});	
*/
	$('#header ul li.drop-down-button a').click(function(){	
	if( $(this).hasClass('selected') ){
			$('#header ul li.menu_item a').removeClass('selected');
	}else{
			$('#header ul li.menu_item a').removeClass('selected');
			$(this).addClass('selected');
		}
	});
	
	$('#header ul li.menu_item.drop-down-button a').click(function(){		
		$('.pop-up-login').hide();
		$('.mobile-menu .drop-down').slideDown('fast');	
	});
	
	$('#header .close-dropdown').click(function(){		
		$('.mobile-menu .drop-down').slideUp('fast');	
		$('#header ul li.menu_item a').removeClass('selected');
	});

var login_enter_timeout;
var login_timeout;
var login_type;
var this_item;

	$('#header ul li.log-in-button > a').mouseenter(function(){
	this_item = $(this);
	login_type = this_item.attr('login_type');
	clearTimeout(login_timeout);
	clearTimeout(login_enter_timeout);
	
	if( this_item.hasClass('logout_button') ) return;
	
	login_enter_timeout = setTimeout(function(){
			$('#header ul li.menu_item a').removeClass('selected');
			$('.mobile-menu .drop-down').hide();
						
			
			$('.' + login_type + ' .pop-up-login').show();
			this_item.addClass('selected');
		},300);
		
	});
	
	$('#header ul li.log-in-button > a').mouseleave(function(){		
		if( this_item.hasClass('logout_button') ) return;		
		clearTimeout(login_enter_timeout);
		login_timeout = popup_login_timeout('.' + login_type + ' .pop-up-login');
	});	
	
	$('.pop-up-login').mouseleave(function(){		
		login_timeout = popup_login_timeout('.' + login_type + ' .pop-up-login');
	});
	
	$('.pop-up-login').mouseenter(function(){		
		clearTimeout(login_timeout);		
	});
	
	$('.top-below-500-px .search-button img').click(function(){
		$('.top-below-500-px .triangle').toggle();
		$('.top-below-500-px .search').toggle();
	});
});

/*
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
*/
/**pop up login**/
function popup_login_timeout(login_box)
{		
	return setTimeout(function(){	
		$(login_box).hide();
		$('#header ul li.log-in-button a').removeClass('selected');		
	},300);
}