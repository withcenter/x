</div>
<div style='clear:both;'></div>
	<div id='footer'>
		<div id='bottom-menus'>
		<a class='home' href='/' class="menu-list">홈</a></li>
		<?if ( $is_admin == 'super' ) {?>
			<a href="<?=ms::url_config()?>" class="admin">어드민패널</a>		
		<? }?>
		<? for ( $i = 1; $i <= 10; $i++ ) { ?>	
		<? if ( $extra['menu_'.$i] != '' ) {
			$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table = '".$extra['menu_'.$i]."'");
		
			if ( $extra['submenu_'.$i] ) $menu_id = "menu=$i";
			else $menu_id = null;		
		?>
			<a class='<?php echo $extra['menu_'.$i]?>' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_'.$i]?>' class="menu-list"><?=strtoupper($option['bo_subject'])?></a>			
		<?}}?>
		<a href="http://www.philgo.com" class="main-site">필고</a>
		</div>
		<div id='copyright'>COPYRIGHT (c) 2014 ALL RIGHTS RESRERVED WEBSITE.COM</div>
	</div>
</div>
</div>