<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?><link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css"><?}?>

<? if ($list) { ?>
<div class='latest-gallery-posts-1-with-image'>
	<?	
		$i = 1;
		foreach ($list as $post) {
			$thumb = get_list_thumbnail($bo_table, $post['wr_id'], 213, 128);    					            
			if($thumb['src']) {
				$img = '<img class="img_left" src="'.$thumb['src'].'">';
				$count_image ++;
			} 
			elseif ( $image_from_tag = g::thumbnail_from_image_tag( $post['wr_content'], $bo_table, 213-2, 128-1 )) {
				$img = "<img class='img_left' src='$image_from_tag'/>";
				$count_image ++;
			}
			else {
				$img = '<img class="img_left" src="'.$latest_skin_url.'/img/no-image.png"/>';				
			}
	?>
		<div class="post-item <? if ($i%4 == 1) echo 'left-item'?>">
			<div class='post-image'>
				<a href="<?=$post['href']?>"><?=$img?></a>
			</div>
			
			<div class='post-content-container'>
				<div class='post-subject'><a href="<?=$post['href']?>"><?=cut_str($post['wr_subject'],15,'...')?></a></div>
				<div class='post-content'><a href="<?=$post['href']?>"><?=cut_str(strip_tags($post['wr_content']),50,'...')?></a></div>
			</div>
		</div>
	<?$i++;}?>
		<div style='clear: left'></div>
</div>
<? } else { ?>
<div class='latest-gallery-posts-1-with-image'>
		<?
			$no_subject = "회원님께서는 현재...";
			$no_content = "필고 갤러리 테마 No.1을 선택 하였습니다.";
		for ( $i = 1; $i <= 4; $i++ ) {
			$img = "<img src='$latest_skin_url/img/no_middle_$i.png'/>";
		?>		
		<div class="post-item <? if ($i == 1) echo 'left-item'?>">
			<div class='post-image'>
				<a href="javascript:void(0)"><?=$img?></a>
			</div>
			
			<div class='post-content-container'>
				<div class='post-subject'><a href="javascript:void(0)"><?=$no_subject?></a></div>
				<div class='post-content'><a href="javascript:void(0)"><?=$no_content?></a></div>
			</div>
		</div>
		

<? } ?>
		<div style='clear: left'></div>
</div>
<?}?>