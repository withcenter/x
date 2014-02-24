<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<?
global $board;
//echo $board['bo_table'];exit;
//di($board);di($list);di($g5);exit;
?>
<div class="image-posts" >
	<div class='inner'>
		<div class='title'><img src="<?=$latest_skin_url?>/img/posts_icon.png"><div class='label'>Single Image Post</div></div>
			
				<?php
					$num = 1;
					foreach ( $list as $li ) {
					if( $num == 3 ) $style = 'no-border'; 					
					if( $board['bo_table'] )
					$thumbnail = get_list_thumbnail($board['bo_table'], $li['wr_id'], 56, 56);
				?>	
					<div class='items <?=$style?>'>
					<?
						$subject = conv_subject($li['wr_subject'], 20, "...");
						$content = cut_str($li['wr_content'], 200, "...");						
						
						$subject .= ":";
						$url = $li['href'];
						echo "
							<a href='$url'>
								<img align='left' src='".$thumbnail['src']."'/>
								<span class='subject'>$subject</span>
								<span class='content'>".strip_tags($content)."</span>
							</a>
						";
						$num ++;
					?>
					</div>
				
				<?}	
					if( empty($list) ){
						echo "empty";
					}
				?>	
		<a class='more-posts' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>'><img src='<?=$latest_skin_url?>/img/more-btn.png'/></a>
	</div>
</div>

