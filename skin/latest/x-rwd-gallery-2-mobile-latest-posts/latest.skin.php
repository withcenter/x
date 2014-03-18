<?php
/**
 *
	@short		반응형 이미지 갤러리. 장치에 따라서 반응하므로 모바일 및 기타 장치에 대한 버젼이 따로 없으며, 필요한 곳에 복사를 하고 호출하면 된다.
	@source	https://github.com/withcenter/x/tree/master/skin/latest/x-gallery		

	@param $options['width']		썸네일 너비.
	@param $options['height']		썸네일 높이.
	@param $options['radisu']		radius
	@code
		echo latest( 'x-gallery', 'ms_test6_1', 40, 40, 1, array('width'=>300, 'height'=>140));
	@endcode
 *
 *
 *
 */
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
	<div class='posts-title'>
		<img src='<?=$options['icon']?>'/><?=$bo_subject?>
	</div>
	<div class='latest-posts-container'>

		<?	$i=0;
			foreach($list as $li ) {
				?>
				<div class='latest-posts <?if ( $i==2 ) echo "last-latest-post";?>'> <?
				$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], $width, $height);
				$i++;
				if ( $imgsrc['src'] ) {
					$img = "<img src='$imgsrc[src]'/>";
				} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $li['wr_content'], $bo_table, $width, $height )) {
					$img = "<img class='img_left' src='$image_from_tag'/>";
				} else $img = "<img src='".$latest_skin_url."/img/no_image.png'";
				$url = $li['href'];
				?>
				<table cellspacing='0' cellpadding='0' width='100%'>
					<tr valign='top'>
						<td  class='latest-image'><a href='<?=$url?>'><?=$img?></a></td>
					<td align='left'>
						<div class='latest-info'>
							<div class='latest-subject'><a href='<?=$url?>'><?=cut_str($li['wr_subject'],100,'...')?></a></div>
							<div class='latest-meta'>
								<b>글쓴이</b> <?=get_sideview($li['mb_id'], $li['wr_name'])?>
								<b>작성일</b> <?=date('m/d/Y', strtotime($li['wr_datetime']))?> <span class='post-divider'>|</span>
								<b>댓글</b> <?=$li['wr_comment']?><span class='post-divider'>|</span>
								<b>조회수</b> <?=$li['wr_hit']?>
							</div>
							<div class='latest-content'>
								<a href="<?=$url?>"><?php echo get_text(cut_str(strip_tags($li['wr_content']), 240, '...' )) ?></a>
							</div>
						</div>
					</td>
				</tr>
			</table>
			</div>
		<?}?>
	</div>
<? } ?>