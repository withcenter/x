
	<ul>
		<li><a href='<?=x::theme_url()?>'>최근 글</a></li>
		<?
			for ( $i = 1; $i <= MS_MAX_FORUM; $i++ ) {
				if ( ms::meta('menu_'.$i) ) {
					$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
					if ( ! $menu = $row['bo_subject'] ) $menu = '제목없음';
		?>
					<li><a href='<?=g::url_forum(ms::meta('menu_'.$i))?>'><?=$menu?></a></li>
		<?
				}
			}
		?>
	</ul>
