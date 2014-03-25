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
<div class='latest-left-gallery'>
	<?for ( $i=0; $i<=1; $i++ ) { 
		if ( $list ) {
			$imgsrc = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 233, 229);
			if ( $imgsrc['src'] ) {
				$img = $imgsrc['src'];
			} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[$i]['wr_content'], $bo_table, 233, 229 )) {
				$img = $image_from_tag;
			} else $img = $latest_skin_url."/img/no_image.png";
			
			$url = $list[$i]['href'];
			$subject = $list[$i]['wr_subject'];
			$content = cut_str(strip_tags($list[$i]['wr_content']), 100, '...');
		} 
		else {
			if ( $i == 0 ) $img = $latest_skin_url."/img/default_banner1.png";
			else if ( $i == 1 ) $img = $latest_skin_url."/img/default_banner2.png";
			
			$url = "javascript:void(0);";
			$subject = "회원님께서는 현재";
			$content = "갤러리 테마 No.2를 사용하고 계십니다.";
			
		}
	?>
		<div class="top-posts <? if ($i==1) echo 'last-post'?>" style="background: url('<?=$img?>')">
			<div class='top-posts-container'>
				<div class='top-posts-subject'><a href="<?=$url?>"><?=$subject?></a></div>
				<div class='top-posts-content'><a href="<?=$url?>"><?=$content?></a></div>
				<? if ( $list ) {?>자세히<a href="<?=$url?>" class='read_more'></a>
				<? } else {?> 사이트 설정<a href='<?=url_site_config()?>' class='read_more'></a> <?}?>
			</div>
		</div>
	<?}?>
	
	<?
		if ( $list ) {
			$imgsrc = get_list_thumbnail($bo_table, $list[2]['wr_id'], 233, 229);
			if ( $imgsrc['src'] ) {
				$img = $imgsrc['src'];
			} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[2]['wr_content'], $bo_table, 478, 128 )) {
				$img = $image_from_tag;
			} else $img = $latest_skin_url."/img/no_image.png";
		
			$url = $list[$i]['href'];
			$subject = $list[2]['wr_subject'];
			$content = cut_str(strip_tags($list[2]['wr_content']), 80, '...');
			
		}
		else {
			$img = $latest_skin_url.'/img/default_banner3.png';
			$url = "javascript:void(0);";
			$subject = "회원님께서는 현재";
			$content = "갤러리 테마 No.2를 사용하고 계십니다.";
		}
	?>
	
	<div class='bottom-post' style="background: url('<?=$img?>')">
		<div class='bottom-posts-container'>
			<div class='bottom-posts-subject'><a href="<?=$url?>"><?=$subject?></a></div>
			<div class='bottom-posts-content'><a href="<?=$url?>"><?=$content?></a></div>
			<? if ( $list ) {?>자세히 <a href="<?=$url?>" class='read_more'></a>
			<? } else {?>사이트 설정 <a href="<?=url_site_config()?>" class='read_more'></a> <?}?>
		</div>		
	</div>
</div>