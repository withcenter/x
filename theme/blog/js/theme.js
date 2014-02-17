$(function(){
	$(window).scroll(function() {
		clearTimeout($.data(this, 'scrollTimer'));
		$.data(this, 'scrollTimer', setTimeout(function() {
			if ($(this).scrollTop() > 220) {
				$('.back-to-top').fadeIn(250);
			} else {
				$('.back-to-top').fadeOut(250);
			}
		}, 500));
	});	

    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 500);
        return false;
    })
	
	$("select[name='write_post']").change(function(){
		$("form[name='post_write']").submit();
	});
});
