<?php
$g5['title'] = "필고";
$g5['cf_title'] = "무료 홈페이지 서비스";

x::hook_register('head_begin', 'hook_head_begin' );
function hook_head_begin()
{

	$d = etc::domain();
	$base = etc::base_domain();
	if ( $d == $base ) {
		$url = etc::browser_url();
		$url = str_replace( $d, "www.$d", $url );
		echo "
			<script>
				location.href='$url';
			</script>
		";
		exit;
	}
}


/**
 *  @short redirecting to login page if the user has not logged.
 */
if ( ( $module == 'multisite' && $action == 'create' ) && !login() ) {
	jsGo( G5_BBS_URL . '/login.php' );
	exit;
}

