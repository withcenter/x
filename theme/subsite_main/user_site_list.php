<?
	
	
	if ( login() ) {
		$my_site = sites( my() );
	if ( $my_site ) {
?>
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/user_site_list.css' />
	<div class='user-site-list'>
		<div class='title'><a href='<?=x::url()?>/?module=site&action=my_sites'>내 사이트 바로가기</a></div>
		<?php
		foreach ( $my_site as $s ) {
			$site_url	= site_url($s['domain']);
			if ( !$title2 = meta_get( $s['domain'], 'title' ) ) $title2 = "제목 없음";
			
			echo "
				
				<div class='row'>
					<a href='$site_url'>$title2</a>
				</div>
			";
		}
	echo "</div>";
	}
}
?>