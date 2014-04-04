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

<div class='latest-top-right'>
	
	<?
	if ( $list ) {
		$imgsrc = get_list_thumbnail($bo_table, $list[0]['wr_id'], 307, 233);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[0]['wr_content'], $bo_table, 307, 233 )) {
			$img = $image_from_tag;
		} else {
			$image_from_tag = g::thumbnail_from_image_tag( "<img src='$latest_skin_url/img/no_image.png'/>", $bo_table, 307, 233 );
			$img = $image_from_tag;
		}
	}
	else $img = $latest_skin_url."/img/no_image.png";
	?>
	
	<div class='top-right'>
			<? if ( $list ) {
					$url = $list[0]['href'];
					$subject = cut_str($list[0]['wr_subject'],10);
					$content = cut_str(strip_tags($list[0]['wr_content']), 20);
			}
			else {
				$url = "javascript:void(0);";
				$subject = "회원님께서는 현재";
				$content = "필고 갤러리 테마 No.3를 선택 하셨습니다.";
			}
			?>
			
		<img src="<?=$img?>"/>
		<div class='top-right-container'>
			<div class='top-right-subject'><a href="<?=$url?>" ><?=$subject?></div>
			<div class='top-right-content'><a href="<?=$url?>" ><?=$content?></div>
		</div>	
		<a href="<?=$url?>" class='read_more'></a>
	</div>
</div>