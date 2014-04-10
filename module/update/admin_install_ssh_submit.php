<?php

$vars['type']			= $type;
$vars['host']			= $host;
$vars['dir']			= $dir;
$vars['id']				= $id;
$vars['password']		= $password;
$vars['source_link']	= urlencode( $source_link );

$var = http_build_query( $vars );

?>
<link rel="stylesheet" href="<?=module("$module.css")?>">
<script src="<?=module("$module.js")?>"></script>
<script>
$(function(){
	var url = "<?=URL_THEME_UPDATE_SERVER?>/x/index.php";
	var data = "module=update&action=ajax_main_server_ssh_install_submit&<?=$var?>";
	ajax_cross_domain_call( {
		type: 'POST',
		url: url,
		data: data,
		callback: 'callback_ajax_call'
	} );

	// callback_ajax_call( { 'code' : '0' } ); // TEST CALL

});
function callback_ajax_call( re )
{
	// alert( re.message );
	if ( re.code == 0 ) {
		$('.loader').remove();
		$('.result.success').show();
	}
}

</script>




<div class='ssh-install-submit'>

	<div class='loader'>
		<img src="<?=x::url()?>/img/loader12.gif">
		<?=ln("Please, wait while $type is being installed.",
			"$type 을(를) 설치 중입니다. 기다려 주십시오.")?>
	</div>
	
	
	<div class='result success'>
		<?=ln("Finished. The $type was installed succfully.",
			"완료. $type 이(가) 성공적으로 설치되었습니다.")?>
	</div>
	
	
	
</div>


