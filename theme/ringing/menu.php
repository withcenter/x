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
	
	<li class="gnb_1dli">
		<a href="<?=g::url()?>" class="gnb_1da">홈</a>
	</li>	
	
	<li class="gnb_1dli">
		<a href="<?=g::url_board('freetalk')?>" class="gnb_1da">자유토론</a>
	</li>
	
	
	<li class="gnb_1dli">
		<a href="<?=g::url_board('qna')?>" class="gnb_1da">질문답변</a>
	</li>
	
	
	
	
	
	
</ul>
    
    </nav>
	