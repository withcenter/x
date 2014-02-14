<?php


x::hook_register('end_before_html', 'hook_rsd_patch');
x::hook_register('end_before_html', 'hook_metaweblogapi');
x::hook_register('end_before_html', 'hook_html_symbol');

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

