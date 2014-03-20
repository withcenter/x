<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?><link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css"><?}?>

<? if ($list) { ?>
<div class='latest-gallery-posts'>
	<div class='title'>
		<a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>"><?=$bo_subject?></a>
	</div>
	<div class='post-items'>
		<? foreach ( $list as $post ) {?>
			<p class='post-item'><img src='<?=$latest_skin_url?>/img/bullet.png'><a href="<?=$post['href']?>"><?=cut_str($post['wr_subject'], 20, '...')?></a></p>
		<?}?>
	</div>
</div>
<? } ?>