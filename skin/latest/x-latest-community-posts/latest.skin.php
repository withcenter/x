<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class="community-posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<img src="<?=$latest_skin_url?>/img/recent-posts.png">
						<span class='label'><?=$bo_subject?></span>
					</td>
					<td align='right'>
						<div class='posts-more'><a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>" >자세히 <img src="<?=$latest_skin_url?>/img/more-icon.png"></a></div>
					</td>
				</tr>
			</table>
		</div>
	<div class='posts-items'>
		<? if( $list ) { ?>
		<ul>
		<?php
			$i = 1;
			$no_of_posts = count($list);
			foreach ( $list as $li ) {
				$subject = $li['subject'];
				$subject .= ":";
				$content = cut_str(strip_tags($li['wr_content']),19,'...');
				$url = $li['href'];
				$comment_count = $li['wr_comment'];
				$no_comment = '';
				if ( !$comment_count = $li['comment_cnt'] ) {
					$comment_count = 0;
					$no_comment = 'no-comment';
				}
		?>	
			<li <? if( $i == $no_of_posts ) echo "class='last-item'"; ?> >				
				<?
					echo "<div class='post-content'><img src='".$latest_skin_url."/img/bullet.png'/><a href='$url' > $subject $content <span class='no-of-comments $no_comment'>[".strip_tags($comment_count)."]</span></a></div>";
				?>
				<?$i++;?>
			</li>		
		<?}?>
		</ul>
		<? }
			else echo "<ul><li><b>".$bo_subject.'</b>게시판에 글을 등록해 주세요</li></ul>';
		?>
	</div>
</div>

