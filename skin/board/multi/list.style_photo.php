<?
	include_once(G5_LIB_PATH.'/thumbnail.lib.php');
	for ($i=0; $i<count($list); $i++) {
	
		$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
		if ( empty($thumb['src']) ) $thumb['src'] = $board_skin_url . "/img/no-image.png";
		
		if($thumb['src']) {
			$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
		} else {
			$img_content = '<span class="no-photo" style="display:inline-block; width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px">no image</span>';
		}
						
?>

<div class="post"><div class='inner'>


	<div class='photo'>
		<?=$img_content?>
	</div>

	<div class="subject">
		<a href="<?php echo $list[$i]['href'] ?>">
			<?php echo $list[$i]['subject'] ?>
          <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
		</a>
	</div>
	
	
	<div style="clear:left;"></div>
	
</div></div>
<? } ?>
