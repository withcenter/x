<?php

	$main = array();

?>
<ul id="top-menu">		
	<?php
		$i = 0;
		foreach ( $main as $row ) {
			
	 ?>
	<?php } 
		if ( $is_admin == 'super' ){
	?>
	<li class="menu-list">
		<a href="<?=url_site_config()?>" class="admin">사이트관리</a>
	</li>
	<?}?>
	
	<? if ( admin() ) {?>
		<li class='menu-list'><a class='my-site-setting' href='<?=url_site_config()?>'>사이트 설정</a></li>
	<? }?>
	
	<? if ( $member['mb_id'] ) {?>
		<li class="menu-list"><a class='my-sites' href='<?=x::url()?>/?module=multisite&action=my_sites'>내 사이트</a></li>
	<? }?>
	
	<? /*
	<? for ( $i = 1; $i <= 10; $i++ ) { ?>
	
	<? if ( $extra['menu_'.$i] != '' ) {
		$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table = '".$extra['menu_'.$i]."'");
	
		if ( $extra['submenu_'.$i] ) $menu_id = "menu=$i";
		else $menu_id = null;		
	?>
		<li class="menu-list" <?=$menu_id?>><a class='<?php echo $extra['menu_'.$i]?>' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_'.$i]?>' class="menu-list" <?// if ($extra['menu'.$i.'_target'] == 'Y') echo "target='_blank'"?>><?=$option['bo_subject']?></a></li>				
	<?}}?>
	*/?>
	
	<li class="menu-list">
		<a href="http://philgo.com" target='_blank' class="main-site">필고</a>
	</li>
</ul>
<script>

	$(function(){			
		if( ("<?php echo $in['bo_table'];?>")){
			$(".menu-list .<?php echo $in['bo_table'];?>").addClass('selected');
		}
		else if ( "<?php echo $in['action']?>" == "my_sites" ){
			$(".menu-list .my-sites").addClass('selected');
		}
		else if ( "<?php echo $in['module']?>" == "admin" || "<?php echo $in['module']?>" == "multisite" || "<?php echo $in['module']?>" == "multidomain" ){
			$(".menu-list .admin").addClass('selected');
		}		
	});

</script>