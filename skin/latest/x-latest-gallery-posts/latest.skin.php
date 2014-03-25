<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?><link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css"><?}?>

<div class='latest-gallery-posts'>
	<div class='title'>
		<a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>"><?=$bo_subject?></a>
	</div>
	<div class='post-items'>
		<?php if ( $list ) {?>
			<? foreach ( $list as $post ) {?>
				<p class='post-item'><img src='<?=$latest_skin_url?>/img/bullet.png'><a href="<?=$post['href']?>"><?=cut_str($post['wr_subject'], 20, '...')?></a></p>
			<?}?>
		<?}
			else {?>
				<p class='post-item'><img src='<?=$latest_skin_url?>/img/bullet.png'><a href='javascript:void(0);'>현재 회원님께서는</a></p>
				<p class='post-item'><img src='<?=$latest_skin_url?>/img/bullet.png'><a href='javascript:void(0);'>필고 갤러리 테마 No.2를</a></p>
				<p class='post-item'><img src='<?=$latest_skin_url?>/img/bullet.png'><a href='javascript:void(0);'>사용하고 계십니다.</a></p>
				<p class='post-item'><img src='<?=$latest_skin_url?>/img/bullet.png'><a href='<?=url_site_config()?>'>사이트설정 바로가기</a></p>
		<?	}?>
	</div>
</div>