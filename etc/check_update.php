<?php
	include x::dir() . '/etc/version.php';
?>
<style>
#x-check > iframe {
	display:none;
	width: 100%;
	height: 40px;
}
</style>

<script>
window.addEventListener( 'message', x_update_message, false );
function x_update_message( e )
{
	if ( e.data == 'update' ) document.querySelector('#x-check > iframe').style.display = 'block';
}
</script>

<div id='x-check'>
<iframe src="<?=URL_X?>/?module=update&action=check_submit&version=<?=$version?>" frameborder='0' scrolling='no'></iframe>
</div>
