$(function(){		
	$('ul#tnb > li a').mouseenter(function() {
			$(this).addClass('selected');
	});
	$('ul#tnb > li a').mouseleave(function() {
			$(this).removeClass('selected');
	});	
	
	$('ul#tnb > li a').each(function() {
		if(window.location.pathname == '/') {
				$('ul#tnb > li a:first-child').eq(0).parent().addClass('selected');
			}
		else if(window.location.href == $(this).attr('href')) {
				$(this).parent().addClass('selected');
			}
	});
	
    $(window).scroll(function() {
        if ($(this).scrollTop() > 220) {
            $('.back-to-top').fadeIn(250);
        } else {
            $('.back-to-top').fadeOut(250);
        }
    });
    
    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 500);
        return false;
    })
});
