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
<div class='latest-left-gallery'>
	<?for ( $i=0; $i<=1; $i++ ) { 
		$imgsrc = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 233, 229);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[$i]['wr_content'], $bo_table, 233, 229 )) {
			$img = $image_from_tag;
		} else $img = $latest_skin_url."/img/no_image.png";
	?>
		<div class="top-posts <? if ($i==1) echo 'last-post'?>" style="background: url('<?=$img?>')">
			<div class='top-posts-container'>
				<div class='top-posts-subject'><a href="<?=$list[$i]['href']?>"><?=$list[$i]['wr_subject']?></a></div>
				<div class='top-posts-content'><a href="<?=$list[$i]['href']?>"><?=cut_str(strip_tags($list[$i]['wr_content']), 100, '...')?></a></div>
				<a href="<?=$list[$i]['href']?>">READ MORE</a>
			</div>
		</div>
	<?}?>
	
	<?
		$imgsrc = get_list_thumbnail($bo_table, $list[2]['wr_id'], 233, 229);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[2]['wr_content'], $bo_table, 478, 128 )) {
			$img = $image_from_tag;
		} else $img = $latest_skin_url."/img/no_image.png";
	?>
	
	<div class='bottom-post' style="background: url('<?=$img?>')">
		<div class='bottom-posts-container'>
			<div class='bottom-posts-subject'><a href="<?=$list[$i]['href']?>"><?=$list[2]['wr_subject']?></a></div>
			<div class='bottom-posts-content'><a href="<?=$list[$i]['href']?>"><?=cut_str(strip_tags($list[2]['wr_content']), 100, '...')?></a></div>
			<a href="<?=$li[2]['href']?>">READ MORE</a>
		</div>		
	</div>
</div>
<? } ?>