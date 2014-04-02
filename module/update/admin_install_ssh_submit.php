<?php

$vars['type']			= $type;
$vars['host']			= $host;
$vars['dir']			= $dir;
$vars['id']				= $id;
$vars['password']		= $password;
$vars['source_link']	= urlencode( $source_link );

$var = http_build_query( $vars );

?>


<script>
var url = "<?=URL_THEME_UPDATE_SERVER?>/x/index.php";
var data = "module=update&action=ajax_main_server_ssh_install_submit&<?=$var?>";
ajax_cross_domain_call( {
	type: 'POST',
	url: url,
	data: data,
	callback: 'callback_ajax_call'
} );
//trace( url );
function callback_ajax_call( re )
{
	alert( re );
}
</script>




