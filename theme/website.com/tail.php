</div>
<div style='clear:both;'></div>
	<div id='footer'>
		<div id='bottom-menus'>
		<a class='home' href='/' class="menu-list"><?=ln('HOME')?></a></li>
		<?php if ( $is_admin == 'super' || ms::admin()) { ?>
			<a href="<?=x::url()?>/?module=admin&action=index" class="admin"><?=ln('ADMIN PAGE')?></a>		
		<? } ?>
		<? for ( $i = 1; $i <= 10; $i++ ) { ?>	
		<? if ( $extra['menu_'.$i] != '' ) {
			$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table = '".$extra['menu_'.$i]."'");
		
			if ( $extra['submenu_'.$i] ) $menu_id = "menu=$i";
			else $menu_id = null;		
		?>
			<a class='<?php echo $extra['menu_'.$i]?>' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_'.$i]?>' class="menu-list"><?=strtoupper($option['bo_subject'])?></a>			
		<?}}?>
		<a href="<?=ms::url_main_site()?>" class="main-site"><?=ln('MAIN SITE')?></a>
		</div>
		<div id='copyright'>COPYRIGHT Ⓒ 2014 ALL RIGHTS RESRERVED WEBSITE.COM</div>
	</div>
</div>
</div>