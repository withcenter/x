<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if ( $list ) {?>
	<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
	<div class="latest-posts" >
		<div class='inner'>
			<div class='title'><img src="<?=$latest_skin_url?>/img/latest_icon.png"><div class='label'>최근 등록글</div></div>
				
					<?php
						$num = 1;
						foreach ( $list as $li ) {
						if( $num == 3 ) $style = 'no-border'; 
					?>	
						<div class='items <?=$style?>'>
						<?
							$subject = conv_subject($li['wr_subject'], 70, "...");
							$url = $li['href'];
							echo "
								<a href='$url'>$subject</a>
							";
							$num ++;
						?>
						</div>
					
					<?}?>	
			<a class='more-posts' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>'><img src='<?=$latest_skin_url?>/img/more-btn.png'/></a>
		</div>
	</div>
<? }?>

