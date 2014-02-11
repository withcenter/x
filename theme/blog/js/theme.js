$(function(){		
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
