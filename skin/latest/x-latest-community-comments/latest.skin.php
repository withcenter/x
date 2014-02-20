<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<div class="posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<div><img src="<?=$latest_skin_url?>/img/my-posts.png"></div>
						<div class='label'>MY POSTS</div>
					</td>
					<td align='right'>
						<div class='posts-more'>more <img src="<?=$latest_skin_url?>/img/more-icon.png"></div>
					</td>
				</tr>
			</table>
		</div>
	<div class='posts-items'>
		<ul>
		<?php
			
			foreach ( $list as $li ) {
				$subject = conv_subject($li['wr_subject'], 18, "...");				
				$subject .= ":";
				$url = $li['href'];
				$comment_count = $li['comment_cnt'];
		?>	
			<li>
				<a href='<?=$url?>'>					
				<?
					echo "<div class='subject'>$subject</div> <div class='no-of-comments'>($comment_count)</div>";
				?>
				</a>
			</li>		
		<?}?>
		</ul>
	</div>
</div>

