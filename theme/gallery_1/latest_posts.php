<?

include_once(G5_LIB_PATH.'/thumbnail.lib.php'); 

$posts = g::posts(
	array(
		'domain'				=> etc::domain(),
		'wr_option'			=> array( "NOT LIKE '%secret%'" ),
		'limit'					=> 3,
	)
);
?>
<div class="com3-latest-posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<img src="<?=x::url_theme()?>/img/3line.png">
						<span class='label'>최근 작성글</span>
					</td>
				</tr>
			</table>
		</div>

	<div class='com3-latest-posts-items'>
		<table width='100%' cellpadding=0 cellspacing=0>
		<?php
			if ( $posts ) {
			$i = 1;
			$ctr = count($posts);
			foreach ( $posts as $p ) {
				$latest_subject = conv_subject($p['wr_subject'],15, '...' );
	
				$latest_url = url_forum_read( $p['bo_table'], $p['wr_id'] );
				
				
				$latest_comment_count = '['.strip_tags($p['wr_comment']).']';
				if ( $latest_comment_count == 0 ) $no_comment = 'no-comment';
				else $no_comment = '';
				
				$latest_img = get_list_thumbnail( $p['bo_table'] , $p['wr_id'], 38, 38);

				if ( !$latest_img ) $img = x::url_theme().'/img/no-image.png';
				else $img = $latest_img['src'];
				if( $i == $ctr ) $last_post = "class='last-item'";
				else $last_post = '';
	
		?>	
				<tr <?=$last_post?> valign='top'>
					<td width='40'>
						<div class='post-image'><a href='<?=$img?>' target='_blank'><img src='<?=$img?>'></a></div>
					</td>
					<td width='110'>
						<div class='subject'><a href='<?=$latest_url?>'><?=$latest_subject?></a></div>
					</td>
					<td width='40' align='right'>
						<span class='num_comments'><?=$latest_comment_count?></span>
					</td>
				</tr>
		<? $i++; 
			}
		}
		else echo "<tr valign='top'><td>최신글이 없습니다.</td></tr>";
	?>
		</table>
	</div>
</div> <!--posts--recent-->
