<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include 'etc/end.php';

$html = ob_get_clean();

			x::hook( 'end_before_html' );
echo $html;
			x::hook( 'end_after_html' );
			x::hook( 'end' );



if ( debug::mode() ) {
	debug::log("x end\t}}");
	//di( "theme: " . x::theme() );
	//di( etc::included_files() );
}


