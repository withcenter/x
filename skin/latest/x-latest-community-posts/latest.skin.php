<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<div class="community-posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<div><img src="<?=$latest_skin_url?>/img/recent-posts.png"></div>
						<div class='label'><?=$bo_subject?></div>
					</td>
					<td align='right'>
						<div class='posts-more'><a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>" target='_blank'>more <img src="<?=$latest_skin_url?>/img/more-icon.png"></a></div>
					</td>
				</tr>
			</table>
		</div>
	<div class='posts-items'>
		<ul>
		<?php
			
			foreach ( $list as $li ) {
				$subject = $li['wr_subject'];
				$subject .= ":";
				$content = cut_str($li['wr_content'],30,'...');
				$url = $li['href'];
				$comment_count = $li['wr_comment'];
				$no_comment = '';
				if ( !$comment_count = $li['comment_cnt'] ) {
					$comment_count = 0;
					$no_comment = 'no-comment';
				}
		?>	
			<li>
				<a href='<?=$url?>' target='_blank'>					
				<?
					echo "<div class='subject'>$subject</div> <div class='post-content'>$content</div> <div class='no-of-comments $no_comment'>($comment_count)</div>";
				?>
				</a>
			</li>		
		<?}?>
		</ul>
	</div>
</div>

