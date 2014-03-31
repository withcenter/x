var trace_count = 0;
function trace( msg )
{
	try {
		trace_count ++;
		console.log("TRACE[" + trace_count + "] " + msg);
	}
	catch ( e ) {
		// e.message
	}
}



/** @short skin update
 *
 */
$(function(){
	$('.skin-update').mouseenter(function(){
		$(this).find('.skin-update-button').show();
	});
	$('.skin-update').mouseleave(function(){
		$(this).find('.skin-update-button').hide();
	});
	$('.skin-update-button').click(function() {
		var code = $(this).attr('code');
		var url = g5_url + '/x/?module=skin&action=update&theme=n&code=' + code;
		layer_popup( url, 1, '680', '520');
	});
});
/* EO skin update */


/** ajax load
	*/
function ajax_load(href, callback)
{
	$.ajax({
			url: href,
			success: function(re) {
				if (callback && typeof(callback) === "function") {
					callback(re);
				}
			},
			error: function(xhr) {
				////alert('Error! Status = ' + xhr.status + "\r\n\r\nPlease notify this to your manager immediately.");
			}
		});
}



/** @short returns ajax-loaded data from webserver.
 *  
 *  @details it can be used to call a function in a different domain.
 *
 *  @code
		var url = "<?=URL_THEME_UPDATE_SERVER?>/x/index.php";
		var data = "module=update&action=ajax_main_server_theme_list&theme=n&<?=$var?>";
		ajax_cross_domain_load( {
			type: 'POST',
			url: url,
			data: data,
			callback: callback_ajax_load
		} );
 *  @endcode
 *  
 *
 */
function ajax_cross_domain_call( option )
{

	if ( typeof option.type == 'undefined' ) option.type = 'GET';
	option.contentType		= "application/json";
	option.dataType			= 'jsonp';
	option.crossDomain		= true;
	if ( typeof option.data == 'undefined' ) {
		option.data	= null;
	}
	if ( typeof option.callback != 'undefined' ) {
		option.jsonpCallback	= option.callback;
		if ( option.data != null ) option.data += "&";
		option.data += "callback=" + option.callback;
		delete option.callback;
	}
	option.success = function( res ) {
		// success function
	}
	
	/** */
	$.ajax( option );
}




/**
 *
	https://docs.google.com/a/withcenter.com/document/d/17zGlMQgCqdLm7iQxKNFjB7s1NMMpCXSbHLlKIvWad4A/edit#heading=h.i4tdtwn1fawf	
 */
var layer_popup_auto_close = 1;
$(function(){
	$('body').on('click', '.layer_popup_mask', function(){
		if ( layer_popup_auto_close == 1 ) close_layer_popup();
	});

	//// @note ESC 키를 누르면 창이 사라진다.
	$(document).keydown(function(event) {
		if ( layer_popup_auto_close == 1 ) {
			if ( event.which=='27' ) close_layer_popup();
		}
	});
});
/** 언제 어디서든지 이 함수만 호출하면 열린 팝업창이 닫긴다. */
function close_layer_popup()
{
	$('.layer_popup').remove();
	$('.layer_popup_mask').remove();
}
/** 이 함수는 초기화 안전 장치가 없기 때문에, DOM 초기화가 끝난 다음이나 사용자의 이벤트 입력 후 또는 jQuery 초기화 코드 안에서 실행을 해야 한다.
 */
function layer_popup( href, auto_close, w, h, scroll ) { return popup_layer( href, auto_close, w, h, scroll ); }
function popup_layer( href, auto_close, w, h, scroll )
{
	if ( typeof(auto_close) == "undefined" ) layer_popup_auto_close = 1;
	else layer_popup_auto_close = auto_close;
	if ( typeof(scroll) == "undefined" ) scroll = '';
	else scroll = "scrolling='no'";
	$('body').append("<div class='layer_popup_mask'></div>");
	$('body').append("<div class='layer_popup'><iframe src='"+href+ "' " + scroll + " style='width:100%; height:100%; border: 0px;'></iframe></div>");
	$('.layer_popup_mask').css({
		"position":"absolute",
		"left":0,
		"top":0,
		"z-index":987654321,
		"background-color": "#000",
		"opacity": "0.6"
		})
		.css({'width':$(window).width(),'height':$(document).height()});
	$layer = $('.layer_popup');
	$layer
		.css('position', 'absolute')
		.css("z-index", 987654322)
		.css('width', w + 'px').css('height', h + 'px')
		.css("top", (($(window).height() - $layer.height()) / 2) + $(window).scrollTop() + "px")
		.css("left", (($(window).width() - $layer.width()) / 2) + $(window).scrollLeft() + "px")
		.css('background-color', 'white')
		.css('border', '1px solid #cdcdcd')
		.css('border-radius', '2px')
		;
	$layer.fadeIn();
}
