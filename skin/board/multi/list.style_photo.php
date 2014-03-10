 <style>
 .photo .no-photo {
	width:<?=$board['bo_gallery_width']?>px;
	max-height:<?=$board['bo_gallery_height']?>px;
}
 </style>
<div class='list-photo-style'>
<?
	include_once(G5_LIB_PATH.'/thumbnail.lib.php');
	for ($i=0; $i<count($list); $i++) {
		$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
		if ( empty($thumb['src']) ) $img_content = '<img class="no-photo" src="'.$board_skin_url . "/img/no-image.png".'" alt="'.$thumb['alt'].'">';
		else $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'">';
?>

<div class="post"><div class='inner'>
	<div class='photo'>
		<a href="<?php echo $list[$i]['href'] ?>"><?=$img_content?></a>
	</div>

	<div class='text'><div class='inner'>
		<div class="list-subject">
			<a href="<?php echo $list[$i]['href'] ?>">
				<?php echo $list[$i]['subject'] ?>
			  <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span> ... (<?php echo $list[$i]['comment_cnt']; ?> )<span class="sound_only">개</span><?php } ?>
			</a>
		</div>
		<div class='list-content'>
			<a href="<?php echo $list[$i]['href'] ?>"><?=string::cutstr($list[$i]['wr_content'], 100)?></a>
		</div>
		<div class='list-info'>
			<span class='caption name'>글쓴이:</span> <span class='value name'><?php echo $list[$i]['name'] ?></span>
			<span class='bar'>|</span>
			<span class='caption date'>날짜:</span> <span class='value date'><?php echo $list[$i]['datetime2'] ?></span>
			<span class='bar'>|</span>
			<span class='caption hit'>조회:</span> <span class='value hit'><?php echo $list[$i]['wr_hit'] ?></span>
			
		</div>
	</div></div>
	<div style="clear:left;"></div>
	
</div></div>
<? } ?>
</div>