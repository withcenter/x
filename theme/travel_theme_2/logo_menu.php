<?php
if ( $in['bo_table'] ) {?>
	<style>
		.travel_theme2_header > .header_wrapper > .top-menu li[menu_id='<?=$in['bo_table']?>'] .inner{
			background-color: #24abc2; 
		}
		.travel_theme2_header > .header_wrapper > .middle-menu li[midmenu_id='<?=$in['bo_table']?>'] a {
			border-bottom: 2px solid #a6ddea;
		}
		
	</style>
<?}
	else {?>
	<style>
		.travel_theme2_header > .header_wrapper > .middle-menu li[midmenu_id='home'] a {
			border-bottom: 2px solid #a6ddea;
		}
	</style>
<?}?>
<div class="logo">
	<a href="<?=g::url()?>">
	<? if( ms::meta('header_logo') ) { ?>
		<? /*<img src="<?=ms::url_site(etc::domain()).ms::meta('img_url').ms::meta('header_logo')?>" width=240 height=119> */?>
	<? } else {?>
		<img src='<?=x::url_theme()?>/img/logo.png'>
	<? }?>
	</a>
</div>	
	
<ul class='top-menu'>
	<?php
		for ( $i=1; $i <=5; $i++ ) {
			if ( $board_id = ms::meta('menu_'.$i) ) {
				$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='$board_id'");
				echo "<li menu_id='".$board_id."'><div class='inner'><a href='".G5_BBS_URL."/board.php?bo_table=".$board_id."'>".$row['bo_subject']."</div></a></li>";
			}
		}
	?>
</ul>
<div style='clear:both;'></div>

<ul class='middle-menu'>
	<li midmenu_id='home'><a href='<?=g::url()?>'>홈</a></li>
	<?php
		for ( $i=6; $i <=10; $i++ ) {
			if ( $board_id = ms::meta('menu_'.$i) ) {
				$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='$board_id'");
				echo "<li midmenu_id='".$board_id."'><div class='inner'><a href='".G5_BBS_URL."/board.php?bo_table=".$board_id."'>".$row['bo_subject']."</div></a></li>";
			}
		}
	?>
	<li><a href='<?=ms::url_config()?>'>사이트 관리</a></li>
</ul>
<div style='clear:left;'></div>
	