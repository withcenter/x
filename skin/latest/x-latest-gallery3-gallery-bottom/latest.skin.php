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

<div class='latest-bottom-gallery'>
	
	<?		
	if ( $list ) {
		if( $options ){
			$gallery_info = array( 
				array('bottom-left','bottom-middle','bottom-right'),
				array($options['width_1'], $options['width_2'], $options['width_3']),
				array($options['height_1'], $options['height_2'], $options['height_3'])
			);
		}
		else{
			$gallery_info = array( array('bottom-left','bottom-middle','bottom-right'),array(318, 211, 318), array(213, 167, 213));
		}
	for ($i = 0; $i<=2; $i++ ) {
		$imgsrc = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $gallery_info[1][$i], $gallery_info[2][$i]);
		if ( $imgsrc['src'] ) {
			$img = $imgsrc['src'];
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list[$i]['wr_content'], $bo_table, $gallery_info[1][$i], $gallery_info[2][$i] )) {
			$img = $image_from_tag;
		} else $img = g::thumbnail_from_image_tag("<img src='".$latest_skin_url."/img/no-image.png'/>", $bo_table, $gallery_info[1][$i], $gallery_info[2][$i]);
		echo latest_bottom_gallery($gallery_info[0][$i],$img,$list,$i);
	} 
		echo "<div style='clear: left'></div>";
	}	
	?>
	
	
<? function latest_bottom_gallery( $name, $img, $list, $i ) { ?>
	<div class='<?=$name?>'>
				<? if ( $list ) {
						$url = $list[$i]['href'];
						$subject = cut_str($list[$i]['wr_subject'],10);
						$content = cut_str(strip_tags($list[$i]['wr_content']), 20);
				}
				else {
					$url = "javascript:void(0);";
					$subject = "회원님께서는 현재";
					$content = "필고 갤러리 테마 No.2를 선택 하셨습니다.";
				}
				?>
		<div class='inner'>
			<a href="<?=$url?>" ><img src="<?=$img?>"/></a>
			<div class='<?=$name?>-container'>
				<div class='<?=$name?>-subject'><a href="<?=$url?>" ><?=$subject?></a></div>
				<div class='<?=$name?>-content'><a href="<?=$url?>" ><?=$content?></a></div>
			</div>
		</div>
		<a href='<?=$url?>' class='read_more'></a>
	</div>
<?}?>
</div>