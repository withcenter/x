<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class="community3-posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left'>
						<img src="<?=$latest_skin_url?>/img/my-posts.png">
						<span class='label'><a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'><?=cut_str($bo_subject,15,"...")?></a></span>
					</td>
					<td align='right'>
						<div class='posts-more'><a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>" >자세히 <!--<img src="<?=$latest_skin_url?>/img/more-icon.png">--></a></div>
					</td>
				</tr>
			</table>
		</div>
	<div class='community3-posts-items'>
		<table cellspacing='5'>
	<?php
		if( $list ) { 
			$i = 1;
			$no_of_posts = count($list);
			foreach ( $list as $li ) {
				$subject = $li['wr_subject'];
				$subject .= ":";
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
					echo "<td width='10' valign='middle'><div class='posts-square'><img src='$latest_skin_url/img/square-icon.png'></div></td><td width='120'><a href='$url' class='content-community-3'>$content</a></td><td width='40' align='right'><span class='no-of-comments $no_comment'><a href='$url'> [$comment_count]</a></span></td>";
				?>
				<?$i++;?>
			</tr>	
		<?}
		}
		else {?>
			<tr>
			<td width='10' valign='middle'><div class='posts-square'><img src='<?=$latest_skin_url?>/img/square-icon.png'></div></td><td width='120'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4' class='content-community-3'>블로그 만들기</a></td><td width='40' align='right'><a href='$url'> <span class='no-of-comments $no_comment'>[99]</span></a></td>
			</tr>
			<tr>
			<td width='10' valign='middle'><div class='posts-square'><img src='<?=$latest_skin_url?>/img/square-icon.png'></div></td><td width='120'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3' class='content-community-3'>커뮤니티 사이트 만들기</a></td><td width='40' align='right'><a href='$url'> <span class='no-of-comments $no_comment'>[99]</span></a></td>
			</tr>
			<tr>
			<td width='10' valign='middle'><div class='posts-square'><img src='<?=$latest_skin_url?>/img/square-icon.png'></div></td><td width='120'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3' class='content-community-3'>여행사 사이트 만들기 안내</a></td><td width='40' align='right'><a href='$url'> <span class='no-of-comments $no_comment'>[99]</span></a></td>
			</tr>
			<tr class='last-item'>
			<td width='10' valign='middle'><div class='posts-square'><img src='<?=$latest_skin_url?>/img/square-icon.png'></div></td><td width='120'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=1' class='content-community-3'>(모바일)홈페이지, 스마트폰 앱</a></td><td width='40' align='right'><a href='$url'> <span class='no-of-comments $no_comment'>[99]</span></a></td>
			</tr>
		<?}?>
		</table>
		
	</div>
</div>
