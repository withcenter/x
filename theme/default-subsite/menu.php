<?php

	$main = array();
	
	

?>

   <nav id="gnb">


<script>$('#gnb').addClass('gnb_js');</script>
<h2>메인메뉴</h2>
	
<ul id="gnb_1dul">
	<?php
		/*
			<li class="gnb_1dli"><a href='/' class="gnb_1da"><?=ln('Home')?></a></li>
		*/
		
		
		
	?>
	
<? /*
	<li class="gnb_1dli">
		<a href="<?=g::url_board(ms::board_id(etc::domain()))?>" class="gnb_1da"><?=ln('Forum')?></a>
	</li>
*/?>	
	<?php
		$i = 0;
		foreach ( $main as $row ) {
			
	 ?>
	<li class="gnb_1dli">
		<a href="<?php echo G5_BBS_URL ?>/group.php?gr_id=<?php echo $row['gr_id'] ?>" class="gnb_1da"><?php echo $row['gr_subject'] ?></a>
		<ul class="gnb_2dul">
			<?php
				$sub = $subs[$i++];
				
					foreach ( $sub as $row2 ) {
			 ?>
				<li class="gnb_2dli"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $row2['bo_table'] ?>" class="gnb_2da"><?php echo $row2['bo_subject'] ?></a></li>
			<?php
					}
			?>
		</ul>
		
	</li>
	<?php } ?>
	
	
	<? for ( $i = 1; $i <= 10; $i++ ) { ?>
	<? if ( $extra['menu_'.$i] ) { 
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".$extra['menu_'.$i]."'");
		if ( !$subject = $row['bo_subject'] ) $subject = null;
	?>
		<li class="gnb_1dli"><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_'.$i]?>' class="gnb_1da" <?// if ($extra['menu'.$i.'_target'] == 'Y') echo "target='_blank'"?>><?=$subject?></a></li>
	<?}}?>
	
	
	
	
	<li class="gnb_1dli">
		<a href="<?=ms::url_config()?>" class="gnb_1da"><?=lang('Admin Page')?></a>
	</li>
	
	
</ul>
</nav>
	