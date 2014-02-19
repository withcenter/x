$(function() {
	$(".bottom_latest .photo").mouseenter(function() {
		$(".bottom_latest .photo .subject").hide();
		$(this).children('.subject').show();
	});
	$(".bottom_latest .photo").mouseleave(function() {
		$(this).children('.subject').hide();
	});
});