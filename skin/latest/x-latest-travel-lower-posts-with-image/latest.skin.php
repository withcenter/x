<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<link rel="stylesheet" href="<?php echo $skin_url ?>/style.css">
<div class="lower-travel-posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<img src="<?=$latest_skin_url?>/img/my-posts.png">
						<span class='label'><?=$bo_subject?></span>
					</td>
					<td align='right'>
						<div class='posts-more'><a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>" >자세히 <!--<img src="<?=$latest_skin_url?>/img/more-icon.png">--></a></div>
					</td>
				</tr>
			</table>
		</div>

	<div class='lower-travel-posts-items'>
		<table cellpadding=0 cellspacing=0>
		<?php
			$i = 1;
			$ctr = count($list);
			foreach ( $list as $li ) {
				$subject = $li['wr_subject'];
				$subject .= ": ";
				$content = cut_str(strip_tags($li['wr_content']),100,'...');
				$url = $li['href'];
				$comment_count = '['.strip_tags($li['wr_comment']).']';
				if ( $comment_count == 0 ) $no_comment = 'no-comment';
				else $no_comment = '';
				$img = get_list_thumbnail( $bo_table , $li['wr_id'], 38, 38);
				if ( !$img ) $img = $latest_skin_url.'/img/no-image.png';
				else $img = $img['src'];
				if( $i == $ctr ) $last_post = "class='last-item'";
				else $last_post = '';
		?>	
				<tr <?=$last_post?> valign='top'>
					<td width='40'>
						<div class='post-image'><a href='<?=$img?>' target='_blank'><img src='<?=$img?>'></a></div>
					</td>
					<td width='200px'>
						<div class='subject'><a href='<?=$url?>'><?=$subject.$content?></a></div>
					</td>
					<td width='40' align='right'>
						<span class='num_comments'><?=$comment_count?></span>
					</td>
				</tr>
		<? $i++; }?>
		</table>
	</div>
</div> <!--posts--recent-->