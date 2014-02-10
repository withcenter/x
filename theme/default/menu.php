<?php
	
	list ( $main, $subs ) = g::get_menu();


?>

   <nav id="gnb">


<script>$('#gnb').addClass('gnb_js');</script>
<h2>메인메뉴</h2>
<ul id="gnb_1dul">
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
	
	
	
	
	
</ul>
    
    </nav>
	