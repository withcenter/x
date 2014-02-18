<? if ( $member['mb_id'] ) {
	$my_site = ms::my_site();
?>
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/user_site_list.css' />
<div class='user-site-list'>
	<div class='title'><a href='<?=x::url()?>/?module=multisite&action=my_sites'>내 사이트 바로가기</a></div>
	<?php
	foreach ( $my_site as $s ) {
		$site_url = ms::url_site($s['domain']);
		echo "
			<div class='row'>
				<a href='$site_url'>$s[title]</a>
			</div>
		";
	}
}
?>
</div>