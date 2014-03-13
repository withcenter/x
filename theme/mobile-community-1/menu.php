<?/*
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
		
		<li class='all-menu'><a href='javascript:close_menu();'>전체 메뉴 닫기</a></li>
		
	</ul>
*/?>

<ul>
<?for ( $i = 1; $i <= 7; $i++ ) {
	if( $i == 7 ) $no_margin = "class = 'no-margin'";
	else $no_margin = null;
?>
	<li <?=$no_margin?> menu_num = 'menu_<?=$i?>'>
	<a href='#'><img src='<?=x::url_theme()?>/img/icon<?=$i?>.png'/></a>
	<div class='label'><a href='#'>Menu</a></div>
	</li>
<?}?>
</ul>