<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<div class="posts" >
	<div class='inner'>
		<div class='title'><img src="<?=$latest_skin_url?>/img/posts_icon.png"><div class='label'>POSTS</div></div>
			
				<?php
					$num = 1;
					foreach ( $list as $li ) {
					if( $num == 3 ) $style = 'no-border'; 
				?>	
					<div class='items <?=$style?>'>
					<?
						$subject = conv_subject($li['wr_subject'], 20, "...");
						$content = cut_str($li['wr_content'], 80, "...");						
						
						$subject .= ":";
						$url = $li['href'];
						echo "
							<span class='subject'><a href='$url'>$subject</a></span>
							<span class='content'><a href='$url'>$content</a></span>
						";
						$num ++;
					?>
					</div>
				
				<?}?>	
		<a class='more-posts' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>'><img src='<?=$latest_skin_url?>/img/more-btn.png'/></a>
	</div>
</div>

