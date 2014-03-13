<div class='left-menu-wrapper'>
	<div class='header'><img src='<?=x::url_theme()?>/img/star.png'/>죄회수가 많은 글</div>
		<div class='inner'>
		<?php
		$posts = g::posts(
			array(
				'limit'					=> 3,
				'order by' => 'wr_hit DESC'
			)
		);
			$i = 0;
			foreach ( $posts as $p ) {
				$subject = cut_str(strip_tags($p['wr_subject']), 15, "...");
				$content = cut_str(strip_tags($p['wr_content']), 20, "...");
				$post_url = ms::url_site($p['domain'])."/bbs/board.php?bo_table=".$p['bo_table']."&wr_id=".$p['wr_id'];
			?>
			<div class='info-wrapper'>
				<div class='top-info bo-table'><a href='<?=$post_url?>' target='_blank'><?=++$i?>) <?=$p['domain']?> (조회수: <?=number_format($p['wr_hit'])?> )</a></div>
				<div class='other-info subject'><a href='<?=$post_url?>' target='_blank'><?=$subject?></a></div>
				<div class='other-info content'><a href='<?=$post_url?>' target='_blank'><?=$content?></a></div>
			</div>
		<?}?>

	<? /*
	<div class='view-more'><a href="<?=x::url()?>/?module=multi&action=forum.list">자세히</a></div>
	*/?>
</div>