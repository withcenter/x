<?php

for ( $i = 1 ; $i <= 5 ; $i++ ) {
	if ( !(${'forum_' . $i}) ) continue;
		$posts[${'forum_' . $i}] = db::rows("SELECT wr_id, wr_subject, wr_datetime, wr_comment, wr_hit FROM ".$g5['write_prefix'].${'forum_' . $i}." WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
}

if ( $posts ) { ?>

<div class='popular-posts'>
	<div class='title'>
		<table width='100%'>
			<tr valign='top'>
				<td align='left' class='title-left'>
					<img src="<?=x::url_theme()?>/img/popular-posts.png">
					<span class='label'>조회수가 많은 글</span>
				</td>
			</tr>
		</table>
	</div>
	
	<div class='popular-posts-items'>
		<table cellspacing='5'>
		<?php
		if ( $posts ) {
			$i = 1;
			$ctr = 2;
			//foreach ( $posts as $key => $value ) {  $ctr = $ctr + count($value); }
			foreach ( $posts as $key => $post ) { if($i >= 2) break;
				foreach ( $post as $p ) {
					$url = G5_BBS_URL."/board.php?bo_table=$key&wr_id=$p[wr_id]";
					$popular_subject = conv_subject( $p['wr_subject'], 15, '...');
					$no_of_views = $p['wr_hit'];
					$no_of_comments = $p['wr_comment'];
					
						if ( $i==$ctr ) $last_post = "class='last-post'";
						echo "
								<tr $last_post>
									<td width='15'>
										<div class='post-num'>$i</div>
									</td>
									<td width='125'>
										<a href='$url'>$popular_subject</a>
									</td>
									<td width='50' align='right'>
									<table class='popular-views'>
										<tr valign='top' align='right'>
											<td rowspan=2 width='10'>
												<img src='".x::url_theme()."/img/views.png'>
											</td>
											<td width=20 style='padding-right: 3px;'>
												<span class='num_views'>$no_of_views</span>
											</td>
										</tr>
										<tr valign='top' align='right'>
											<td>
												<span class='num_comments'>[$no_of_comments]</span>
											</td>
										</tr>
									</table>
									</td>
								</tr>
						";
					$i++;
				
				}
		
			 }
		}
		?>
		</table>
	</div>
	</div>
<?}?>