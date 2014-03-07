$(function(){
	$('#login-button').click(function(){
		if ( $('#login-box').css('display') == 'none' ) $('#login-box').show();
		else $('#login-box').hide();
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
