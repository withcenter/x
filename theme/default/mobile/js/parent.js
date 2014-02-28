window.addEventListener('message', receiver, false);
function receiver(e) {
	if ( e.data.name == 'resize' ) resize_iframe( e.data );
	if ( e.data.name == 'move top' ) move_top();
}

function resize_iframe( data )
{
	console.log("e.height:" + data.height );
	document.getElementById("content").height= ( data.height ) + "px";
}

function move_top()
{
	window.scrollTo(0,0);
}
