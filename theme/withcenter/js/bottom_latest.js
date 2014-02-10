$(function() {
	$(".bottom_latest .photo").mouseenter(function() {
		$(".bottom_latest .photo .subject").hide();
		$(this).children('.subject').show();
	});
});