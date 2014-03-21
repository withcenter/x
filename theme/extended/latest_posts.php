<? $posts = g::posts(array( 'wr_is_comment' => 0,
							'order by' => 'wr_datetime DESC',
							'limit' => 13 ));
							?>
<div class='rwd-mobile-posts'>
	<div class='title'>
		LATEST POSTS
	</div>
	<div class='bottom-bar'></div>
	<div class='post-items'>
		<? foreach ( $posts as $post ) {
			$url = "bbs/board.php?bo_table=".$post['bo_table']."&wr_id=".$post['wr_id'];
		?>
			<p class='post-item'><img src="<?=x::theme_url('img/bullet.png')?>"><a href="<?=$url?>"><?=cut_str($post['wr_subject'], 20, '...')?></a></p>
		<?}?>
	</div>
</div>
