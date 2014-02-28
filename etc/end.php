<?php
x::hook_register('end_before_html', 'hook_rsd_patch');
x::hook_register('end_before_html', 'hook_metaweblogapi');
x::hook_register('end_before_html', 'hook_html_symbol');
x::hook_register('end_before_html', 'hook_css_js_version');
x::hook_register('end_before_html', 'hook_html_meta');

function hook_html_meta()
{
	global $html;
	$src = '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">';
	$dst = '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no">';
	$html = str_replace($src, $dst, $html);
}




function hook_rsd_patch()
{
	global $html, $bo_table;
	//debug::log("hook_rsd_patch() begin");
	$domain = etc::domain();
	$url = "http://$domain/$_SERVER[PHP_SELF]?rsd=1&blog_id=$bo_table";
	$patch = '<link rel="EditURI" type="application/rsd+xml" title="RSD" href="'.$url.'" />';
	$html = str_ireplace("</TITLE>", "</TITLE>\n$patch", $html);
}


/** @short removes images that are uploaded by api writer
 * @warning There is a bug in GNUBoard as of 2014-02-08.
 * The value of "ALT" attribute does not appear when it creates thumbnail and it affects this function.
 */
function hook_metaweblogapi()
{
	global $html;
	preg_match_all("/<img[^>]+>/", $html, $ms);
	//dlog($ms);
	if ( $ms[0] ) {
		foreach ( $ms[0] as $img ) {
			if ( strpos( $img, 'metaweblogapi' ) ) {
				$html = str_replace( $img, '', $html );
			}
		}
	}
}



/**
 *  @brief convert HTML Symbol CODE to actual symbol
 *  
 *  @return gobal $html
 *  
 *  @details GNUBoard does not properly convert all the symbols.
 *  just use this function until GNUBoard do some thing for it.
 */
function hook_html_symbol()
{
	debug::log("hook_html_symbol() begin");
	global $html;
	
	$source = array();
	$target = array();
	
	$source[] = "&#038;hellip;";
	$target[] = '...';
	
	$source[] = "&#038;ldquo;";
	$target[] = '"';
	
	$source[] = "&#038;rdquo;";
	$target[] = '"';
	
	$source[] = "&#038;amp;";
	$target[] = '&';
	$source[] = "&#038;ndash;";
	$target[] = '-';
	$source[] = "&#038;rsquo;";
	$target[] = '"';

	$html = str_replace( $source, $target, $html );
}



/**
 *  @brief Update CSS & Javascript Version to let the web browser download new version.
 *  
 *  @return none
 *  
 *  @details To let the web browser automatically download new/updated css and javascript file from the server, update the version number on admin pannel.
 */
function hook_css_js_version()
{
	debug::log("hook_html_symbol() begin");
	global $html;
	
	preg_match_all("/<link[^>]+>/", $html, $ms);
	foreach ( $ms[0] as $link ) {
		if ( strpos( $link, ".css" ) ) {
			$new_link = str_replace( ".css", ".css?version=" . x::$config['global']['site_css_js_version'], $link);
			$html = str_replace( $link, $new_link, $html);
		}
	}
	
	
	preg_match_all("/<script[^>]+>/", $html, $ms);
	foreach ( $ms[0] as $link ) {
		if ( strpos( $link, ".js" ) ) {
			$new_link = str_replace( ".js", ".js?version=" . x::$config['global']['site_css_js_version'], $link);
			$html = str_replace( $link, $new_link, $html);
		}
	}
	
	/*
	preg_match_all("/<script[^>]+>/", $html, $ms);
	dlog( $ms );
	*/
	
}








/** @short reset forum skin select in admin page to support the skin path of x
 *  
 */
if ( board_form_page() ) {
	$dirs = file::getDirs( x::dir() . '/skin/board' );
	foreach ( $dirs as $dir ) {
		$opts .= "<option value='x/skin/board/$dir'>x/skin/board/$dir</option>";
	}
	echo<<<EOH
		<script>
			$(function(){
				$("#bo_skin").append("$opts");
				$("#bo_skin").val('$board[bo_skin]');
			});
		</script>
EOH;
}
