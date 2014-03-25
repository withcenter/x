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

<div class='latest-right-gallery'>
	
	<?
	if ( $list ) {
		$imgsrc = get_list_thumbnail($bo_table, $list[0]['wr_id'], 233, 368);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[0]['wr_content'], $bo_table, 233, 368 )) {
			$img = $image_from_tag;
		} else $img = $latest_skin_url."/img/no_image.png";
	}
	else $img = $latest_skin_url."/img/default_banner.png";
	?>
	
	<div class='right-post' style="background: url('<?=$img?>')">
		<div class='right-posts-container'>
			<? if ( $list ) {
					$url = $list[0]['href'];
					$subject = $list[0]['wr_subject'];
					$content = cut_str(strip_tags($list[0]['wr_content']), 80, '...');
			}
			else {
				$url = "javascript:void(0);";
				$subject = "회원님께서는 현재";
				$content = "필고 갤러리 테마 No.2를 선택 하셨습니다.";
			}
			?>
			<div class='right-posts-subject'><a href="<?=$url?>"><?=$subject?></a></div>
			<div class='right-posts-content'><a href="<?=$url?>"><?=$content?></a></div>
			<? if ( $list ) {?><a href="<?=$url?>">자세히</a>
			<?} else {?> <a href='<?=url_site_config()?>'>사이트 설정</a><?}?>
		</div>		
	</div>
</div>