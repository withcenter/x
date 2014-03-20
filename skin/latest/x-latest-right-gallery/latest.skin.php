<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// thumbnail size
isset($options['width'])		? $width = $options['width'] : $width = 300;
isset($options['radius'])	? $height = $options['height'] : $height = 180;
isset($options['radius'])	? $radius = $options['radius'] : $radius = 2;
?>
<? if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?><link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css"><?}?>

<style>
			.latest-posts-container .latest-posts img {
				border-radius: <?=$radius?>px;
			}
</style>
<? if ($list) { ?>
<div class='latest-right-gallery'>
	<?
		$imgsrc = get_list_thumbnail($bo_table, $list[0]['wr_id'], 233, 368);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[0]['wr_content'], $bo_table, 233, 368 )) {
			$img = $image_from_tag;
		} else $img = $latest_skin_url."/img/no_image.png";
	?>
	
	<div class='right-post' style="background: url('<?=$img?>')">
		<div class='right-posts-container'>
			<div class='right-posts-subject'><a href="<?=$list[0]['href']?>"><?=$list[0]['wr_subject']?></a></div>
			<div class='right-posts-content'><a href="<?=$list[0]['href']?>"><?=cut_str(strip_tags($list[0]['wr_content']), 80, '...')?></a></div>
			<a href="<?=$li[0]['href']?>">READ MORE</a>
		</div>		
	</div>
</div>
<? } ?>