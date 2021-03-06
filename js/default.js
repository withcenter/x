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


/** @short returns the version of Internet Explorer
 * @return if -1 is return then the browser is not IE.
 * @code
	var $v = ie_version();
	if ( $v > 0 &&  $v <= 8 ) {
		/// IE 6,7,8 버젼을 사용하고 있음.
	}
 * @endcode
*/
function ie_version()
// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
{
  var rv = -1; // Return value assumes failure.
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}

/** 브라우저가 IE 가 아니면 참을 리턴한다. */
function is_ie()
{
	return ie_version() != -1;
}
/** returns true if the browser is IE 6,7,8 */
function is_old_ie()
{
	var $v = ie_version();
	if ( $v > 0 &&  $v <= 8 ) return true;
	else return false;
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
		var url = x_url + '?module=skin&action=update&theme=n&code=' + code;
		layer_popup( url, 1, '680', '520');
	});
	
	
	$('.widget-admin').mouseenter(function(){
		$(this).prepend("<div class='button'>Admin</div>");
	});
	$('.widget-admin').mouseleave(function(){
		$(this).children(".button").remove();
	});
	$('body').on('click', '.widget-admin > .button',function() {
		var code = $(this).parent().attr('code');
		var name = $(this).parent().attr('name');
		var url = x_url + '?module=widget&action=update&theme=n&code=' + code +"&name=" + name;
		layer_popup( url, 1, '680', '300');
	});
	
	
});
/* EO skin update */


/** ajax load
	*/
function ajax_load(href, callback)
{
	//trace("ajax_load: begin");
	$.ajax({
			url: href,
			success: function(re) {
				//trace("ajax_load: success");
				if (callback && typeof(callback) === "function") {
					callback(re);
				}
			},
			error: function(xhr) {
				//trace("ajax_load: error");
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
 * @note the callback function will be called with json data.
 * Since the input data is already JSON, so no need to be parsed.
 *
 *  @code example of callback
 * 		function callback_ajax_load( re )
			{
				var len = re.length;
			}
 *  @endcode
 *  
 *  @note the PHP must return javascript function call with JSON data.
 *
 *  @code example of return from PHP
		callback_ajax_load([{"url_preview":"https:\/\/raw.githubusercontent.com\/thruthesky\/office\/master\/preview.jpg","name":"\uc0ac\ubb34\uc2e4 \ud14c\uc2a4\ud2b8 \ud14c\ub9c8","installed":"no","short":"\ubbf8\uc644\uc131 \uc0ac\ubb34\uc2e4 \uc6a9 \ud14c\ub9c8\uc785\ub2c8\ub2e4.","source_link":"https%3A%2F%2Fgithub.com%2Fthruthesky%2Foffice","pname":"office"},{"url_preview":"https:\/\/raw.githubusercontent.com\/thruthesky\/thuthesky-test\/master\/preview.jpg","name":"thruthesky \ud14c\uc2a4\ud2b8 \ud14c\ub9c8","installed":"no","short":"\ud14c\uc2a4\ud2b8 \ud14c\ub9c8\uc785\ub2c8\ub2e4. \uc0ac\uc6a9\ud558\uc9c0 \ub9c8\uc138\uc694.","source_link":"https%3A%2F%2Fgithub.com%2Fthruthesky%2Fthuthesky-test","pname":"thuthesky-test"}])
 *  @endcode
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


if ( is_old_ie() ) {
}
else {
window.addEventListener('message', message_receiver, false);
function message_receiver( e )
{
	if ( e.data.code == 'popup_layer_resize' ) {
		$('.layer_popup').css('height', e.data.height + 'px' );
		trace("popup_layer_resize: " + e.data.height + 'px');
	}
}
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
