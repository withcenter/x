<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?><link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css"><?}?>

<? if ($list) { ?>
<div class='latest-gallery-1-lower-posts'>
	<?	
		$i = 1;
		foreach ($list as $post) {
			$thumb = get_list_thumbnail($bo_table, $post['wr_id'], 233, 208);    					            
			if($thumb['src']) {
				$img = '<img class="img_left" src="'.$thumb['src'].'">';
				$count_image ++;
			} 
			elseif ( $image_from_tag = g::thumbnail_from_image_tag( $post['wr_content'], $bo_table, 233-2, 208-1 )) {
				$img = "<img class='img_left' src='$image_from_tag'/>";
				$count_image ++;
			}
			else {
				$img = '<img class="img_left" src="'.$latest_skin_url.'/img/no-image.png"/>';				
			}
	?>
		<div class="post-item <? if ($i==1) echo 'first-item'?>">
			<div class='post-image'>
				<a href="<?=$post['href']?>"><?=$img?></a>
			</div>
			<div class='post-content-container'>
				<div class='post-subject'><a href="<?=$post['href']?>"><?=cut_str($post['wr_subject'],20,'...')?></a></div>
				<div class='post-content'><a href="<?=$post['href']?>"><?=cut_str(strip_tags($post['wr_content']),175,'...')?></a></div>
			</div>
			<div style='clear: left'></div>		
		</div>
	<?$i++;}?>
		<div style='clear: left'></div>
</div>
<? } ?>