<?php

$vars['type']			= $type;
$vars['host']			= $host;
$vars['dir']			= $dir;
$vars['id']				= $id;
$vars['password']		= $password;

$var = http_build_query( $vars );

?>
<link rel="stylesheet" href="<?=module("$module.css")?>">
<script src="<?=module("$module.js")?>"></script>
<script>
$(function(){
	var url = "<?=URL_THEME_UPDATE_SERVER?>/x/index.php";
	var data = "module=update&action=ajax_main_server_ssh_uninstall_submit&<?=$var?>";
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
	alert( re.code );
	alert( re.message );
	if ( re.code == 0 ) {
		$('.loader').remove();
		$('.result.success').show();
	}
}

</script>




<div class='ssh-install-submit'>

	<div class='loader'>
		<img src="<?=x::url()?>/img/loader12.gif">
		<?=ln("Please, wait while theme is being un-installed.",
			"테마를 삭제 중입니다. 기다려 주십시오.")?>
	</div>
	
	
	<div class='result success'>
		<?=ln("Finished. The theme was un-installed succfully.",
			"완료. 테마가 성공적으로 삭제되었습니다.")?>
	</div>
	
	
	
</div>


