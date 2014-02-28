window.addEventListener('message', receiver, false);
function receiver(e) {
	if ( e.data.name == 'resize' ) resize_iframe( e.data );
}

function resize_iframe( data )
{
	console.log("e.height:" + data.height );
	document.getElementById("content").height= ( data.height ) + "px";
}
