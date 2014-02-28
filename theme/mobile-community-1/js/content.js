parent.postMessage( { 'name' : 'move top' }, '*' );
$(function(){
	resize_iframe();
	setTimeout(function () { resize_iframe(); }, 1000);	// resize after 1 second for sure.
	setTimeout(function () { resize_iframe(); }, 3000);	// resize after 3 seconds for sure.
	setTimeout(function () { resize_iframe(); }, 5000);	// resize after 5 seconds for sure.
	setTimeout(function () { resize_iframe(); }, 15000);	// resize after 15 seconds for sure.
	// if it takes more than 15 seconds, then let's assume that the internet is too slow.
});
$(window).load(function () {
	resize_iframe();
});
function resize_iframe()
{
	var height = $('body').height();
	var data = { 'name' : 'resize', 'height': height };
	parent.postMessage( data, '*' );
}
