$(function(){
	$(".menu-sign-in").click(function(){
		$(".mobile_login").toggle();
	});
	$(".menu-latest-posts").click(function(){
		$(".post-latest").toggle();
	});
	$(".menu-latest-comments").click(function(){
		$(".post-comment-latest").toggle();
	});
});