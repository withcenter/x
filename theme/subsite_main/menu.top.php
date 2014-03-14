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
		<a href="<?=x::url()?>/?module=admin&action=index" class="admin">사이트관리</a>
	</li>
	<?}?>
	
	<? if ( admin() ) {?>
		<li class='menu-list'><a class='my-site-setting' href='<?=url_site_config()?>'>사이트 설정</a></li>
	<? }?>
	
	<? if ( $member['mb_id'] ) {?>
		<li class="menu-list"><a class='my-sites' href='<?=x::url()?>/?module=multi&action=my_sites'>내 사이트</a></li>
	<? }?>
	
	
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