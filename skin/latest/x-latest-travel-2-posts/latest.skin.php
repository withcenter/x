<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class="travel-2-posts" >
		<div class='title'>			
			<div class='label'>
				<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'><?=cut_str($bo_subject,15,'...')?></a>
			</div>
			<img src="<?=$latest_skin_url?>/img/my-posts.png">			
			<div class='posts-more'><a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>" >자세히</a></div>
		</div>
	<div class='travel-2-posts-items'>
		<? if( $list ) { ?>
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
			<div class = 'latest-items'>				
				<div class='item-subject'>
					<img src='<?=$latest_skin_url?>/img/square-icon.png'>
					<a href='<?=$url?>' class='content-community-3'><?=$content?></a>
				</div>				
				<div class='no-of-comments <?=$no_comment?>'>[<?=$comment_count?>]</div>				
				<div style='clear:both'></div>
			</div>			
				<?$i++;?>
		<?}?>
		<? }
			else {?>
			<div class = 'latest-items'>
				<div class='item-subject'><img src='<?=$latest_skin_url?>/img/square-icon.png'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a></div>
				<div style='clear:both'></div>
			</div>
			<div class = 'latest-items'>
				<div class='item-subject'><img src='<?=$latest_skin_url?>/img/square-icon.png'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a></div>
				<div style='clear:both'></div>
			</div>
			<div class = 'latest-items'>
				<div class='item-subject'><img src='<?=$latest_skin_url?>/img/square-icon.png'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3'>커뮤니타 사이트 만들기</a></div>
				<div style='clear:both'></div>
			</div>
			<div class = 'latest-items'>
				<div class='item-subject'><img src='<?=$latest_skin_url?>/img/square-icon.png'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2' style='color: #cc4235; font-weight: bold;'>여행사 사이트 만들기</a></div>
				<div style='clear:both'></div>
			</div>
			<div class = 'latest-items'>
				<div class='item-subject'><img src='<?=$latest_skin_url?>/img/square-icon.png'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=1'>(모바일)홈페이지, 스마트폰 앱</a></div>
				<div style='clear:both'></div>
			</div>
			<?}?>
	</div>
</div>

