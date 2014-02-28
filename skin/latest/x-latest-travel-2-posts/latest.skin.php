<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class="travel-2-posts" >
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
	<div class='travel-2-posts-items'>
		<? if( $list ) { ?>
		<table cellspacing='5'>
		<?php
			$i = 1;
			$no_of_posts = count($list);
			foreach ( $list as $li ) {
				$subject = $li['wr_subject'];
				$content = cut_str(strip_tags($li['wr_content']),15,'...');
				$url = $li['href'];
				$no_comment = '';
				if ( !$comment_count = strip_tags($li['comment_cnt']) ) {
					$comment_count = 0;
					$no_comment = 'no-comment';
				}
		?>	
			<tr <? if( $i == $no_of_posts ) echo "class='last-item'"; ?> valign='top'>				
				<?
					echo "<td width='10' valign='middle'><div class='posts-square'><img src='$latest_skin_url/img/square-icon.png'></div></td><td width='120'><a href='$url' class='content-community-3'>$content</a></td><td width='40' align='right'><a href='$url'> <span class='no-of-comments $no_comment'>[$comment_count]</span></a></td>";
				?>
				<?$i++;?>
			</tr>	
		<?}?>
		</table>
		<? }
			else echo "<ul><li><b>".$bo_subject.'</b>게시판에 글을 등록해 주세요</li></ul>';
		?>
	</div>
</div>

