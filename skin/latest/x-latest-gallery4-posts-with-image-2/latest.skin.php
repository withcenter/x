<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
<? if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?><link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css"><?}?>

<style>
			.latest-posts-container .latest-posts img {
				border-radius: <?=$radius?>px;
			}
</style>

<div class='gallery_with_image_2'>
	
	<?
	if ( $list ) {
	$post_number = 1;
	foreach ( $list as $post ) {
		$imgsrc = get_list_thumbnail($bo_table, $post['wr_id'], $options['width'], $options['height']);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $post['wr_content'], $bo_table, $options['width'], $options['height'] )) {
			$img = $image_from_tag;
		} else $img = g::thumbnail_from_image_tag("<img src='".$latest_skin_url."/img/no-image.png'/>", $bo_table, $options['width'], $options['height']);
		?>
		<div class='gallery4-with-image-2 post_<?=$post_number++?>'>
			<? if ( $post ) {
					$url = $post['href'];
					$subject = cut_str($post['wr_subject'],15,'');
					$content = cut_str(strip_tags($post['wr_content']), 60,'');
			}
			else {
				$url = "javascript:void(0);";
				$subject = "회원님께서는 현재";
				$content = "필고 갤러리 테마 No.3를 선택 하셨습니다.";
			}
			?>
			<div class='inner'>
				<div class='post-image'><a href="<?=$url?>" ><img src="<?=$img?>"/></a></div>
				<div class='subject-wrapper'><div class='subject'><a href="<?=$url?>" ><?=$subject?></a></div></div>
				<div class='content-wrapper'><div class='content'><a href="<?=$url?>" ><?=$content?></a></div></div>
			</div>
			<a href='<?=$url?>' class='read_more'></a>
		</div>

	<?
	} 
		echo "<div style='clear: left'></div>";
	} else {
		echo "
				<div>
					<img src='".$latest_skin_url."/img/no_image_banner.png' />
				</div>
			";
	}	
	?>
	
	

</div>
<?if ( preg_match('/msie 7/i', $_SERVER['HTTP_USER_AGENT'] ) ) {?>
<style>
	.bottom-left img, .bottom-middle img, .bottom-right img {
		width:auto;
	}
</style>
<?}?>
