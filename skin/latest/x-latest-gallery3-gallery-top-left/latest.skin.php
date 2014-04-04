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

<div class='latest-top-left'>
	
	<?
	if ( $list ) {
		$imgsrc = get_list_thumbnail($bo_table, $list[0]['wr_id'], 537, 213);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[0]['wr_content'], $bo_table, 537, 213 )) {
			$img = $image_from_tag;
		} else {
			$image_from_tag = g::thumbnail_from_image_tag( "<img src='$latest_skin_url/img/no_image.png'/>", $bo_table, 537, 213 );
			$img = $image_from_tag;
		}
	}
	else $img = $latest_skin_url."/img/default_banner.png";
	?>
	
	<div class='top-left'>
			<? if ( $list ) {
					$url = $list[0]['href'];
					$subject = cut_str($list[0]['wr_subject'],10,'...');
					$content = cut_str(strip_tags($list[0]['wr_content']), 80, '...');
			}
			else {
				$url = "javascript:void(0);";
				$subject = "회원님께서는 현재";
				$content = "필고 갤러리 테마 No.2를 선택 하셨습니다.";
			}
			?>
		<img style='width: 537px; height: 213px;' src="<?=$img?>"/>
		<div class='top-left-container'>
			<div class='top-left-subject'><?=$subject?></div>
			<div class='top-left-content'><?=$content?></div>
		</div>
		<a href="<?=$url?>" class='read_more'></a>
	</div>
</div>