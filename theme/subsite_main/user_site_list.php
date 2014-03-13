<? if ( login() ) {

	$my_site = sites( my() );
	
	if ( $my_site ) {
?>
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/user_site_list.css' />
	<div class='user-site-list'>
		<div class='title'><a href='<?=x::url()?>/?module=multisite&action=my_sites'>내 사이트 바로가기</a></div>
		<?php
		foreach ( $my_site as $s ) {
			$site_url	= site_url($s['domain']);
			$title		= meta_get( $s['domain'], 'title' );
			echo "
				
				<div class='row'>
					<a href='$site_url'>$title</a>
				</div>
			";
		}
	echo "</div>";
	}
}
?>