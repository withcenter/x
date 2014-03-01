<?php
/**
 *
	@short		반응형 이미지 갤러리. 장치에 따라서 반응하므로 모바일 및 기타 장치에 대한 버젼이 따로 없으며, 필요한 곳에 복사를 하고 호출하면 된다.
	@site		http://g5x.philgo.net/

	@param $options['width']		썸네일 너비.
	@param $options['height']		썸네일 높이.
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
if ( $options['width'] ) $width = $options['width'];
else $width = 300;
if ( $options['height'] ) $height = $options['height'];
else $height = 180;
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<style>


</style>
<ul class="x-gallery">
<?
	$count_image = 0;
	for ($i=0; $i<count($list); $i++) {
		if ( $count_image >= 4 ) break;
                        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $width, $height);    					            
                        if($thumb['src']) {
                            $img = '<img class="img_left" src="'.$thumb['src'].'">';
							$count_image ++;
                        } else {
                            continue;
                        }
						
?>	
	<li>
		<div class='photo'><a href="<?=$list[$i]['href']?>"><?=$img?></a></div>
		<div class='text'>
			<div class='title'><a href="<?=$list[$i]['href']?>"><?php echo cut_str($list[$i]['subject'], 20, "..") ?></a></div>
			<div class='desc'><a href="<?=$list[$i]['href'] ?>"><?php echo get_text(cut_str(strip_tags($list[$i][wr_content]), 65, '...' )) ?></a></div>
		</div>
	</li>
<?php } ?>
</ul>