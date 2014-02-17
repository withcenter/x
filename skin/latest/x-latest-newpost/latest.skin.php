<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<div class="new-posts" >
	<span><img src="<?=$latest_skin_url?>/img/new_icon.jpg"><span class='label'>New Posts</span></span>
	<table width='90%' cellpadding='10px'>
		<?php
			foreach ( $list as $li ) {
				$subject = conv_subject($li['wr_subject'], 50, "...");
				$url = $li['href'];
				echo "
					<tr><td align='left'><a href='$url'>$subject</a></td></tr>
				";
			}
		?>
	</table>	
	<p><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>'>view more</a></p>
	
	
</div>

