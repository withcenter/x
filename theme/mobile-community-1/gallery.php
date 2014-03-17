<div class='mobile-title-bar gallery'>
	<img src='<?=x::url_theme()?>/img/gallery-icon.png'/>갤러리
</div>

<div class='gallery_posts'>
	<?php
		echo gallery_posts( 	array(
						'width'		=> 214,
						'height'	=> 170,
						'radius'	=> 0,
						'domain'	=> etc::domain(),
					)
		);

	function gallery_posts( $options ) {
	global $g5;
	$posts = g::posts(array( 'limit' => 100));

	$i = 0;

	foreach( $posts as $key => $value ) {
		if( $value['wr_is_comment'] != 0 ) continue;
		$lists[$i] = db::row("SELECT * FROM $g5[write_prefix]".$value['bo_table']." WHERE wr_id='".$value['wr_id']."'");
		$lists[$i]['bo_table'] = $value['bo_table'];
		$i++;
	}

	isset($options['width'])	? $width = $options['width'] : $width = 300;
	isset($options['radius'])	? $height = $options['height'] : $height = 180;
	isset($options['radius'])	? $radius = $options['radius'] : $radius = 2;
	add_stylesheet('<link rel="stylesheet" href="'.x::url_theme().'/css/gallery.css">', 0);
	?>	
	<style>
				.x-gallery-2 .photo img {
					border-radius: <?=$radius?>px;
				}
				.x-gallery-2 .text {
					border-bottom-left-radius: <?=$radius?>px;
					border-bottom-right-radius: <?=$radius?>px;
				}
	</style>
	<div class='x-gallery-2-outer'>
	<ul class="x-gallery-2">
	<?
		$count_image = 0;
	$i=0;
	foreach ( $lists as $list ) {
		$thumb = get_list_thumbnail($list['bo_table'], $list['wr_id'], $width, $height);    					            
		if($thumb['src']) {
			$img  = '<img class="img_left" src="'.$thumb['src'].'">';
			$count_image ++;
		} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $list['wr_content'], $bo_table, $width-2, $height-2 )) {
			$img = "<img class='img_left' src='$image_from_tag'/>";
			$count_image ++;
		} else {
			$img = '<img class="img_left" src="'.x::url_theme().'/img/no-image.png"/>';
			$no_image = g::thumbnail_from_image_tag( $img, $bo_table, $width, $height);
			$img = "<img class='img_left no-image' src='$no_image'/>";
			$count_image ++;
		}
		$url = g::url()."/bbs/board.php?bo_table=".$list['bo_table']."&wr_id=".$list['wr_id'];
	?>
			<li <? if ( $i % 4 == 0 ) echo "class='left-images'"?>>
				<div class='post-outer'>
					<div class='post' no="<?=$count_image?>">
						<div class='photo'><a href="<?=$url?>"><?=$img?></a></div>
						<div class='text'>
							<div class='title'><a href="<?=$url?>" class='post-subject'><?php echo cut_str($list['wr_subject'], 10 , "...") ?></a> <span class='post-author'>by <?=get_sideview($list['mb_id'],$list['wr_name'])?></span></div>
							<div class='date-comment-view'><a href="<?=$url?>"><span class='post-date'><?=date('m/d/Y', strtotime($list['wr_datetime']))?></span> <span class='post-divider'> | </span> <span class='post-comment'><?=$list['wr_comment']?> Comment</span> <span class='post-divider'>|</span> <span class='post-views'><?=$list['wr_hit']?> view</span></a></div>
							
							<div class='date-comment-view-mobile'>
								<span class='post-mobile-meta'><span class='post-author'>by <?=get_sideview($list['mb_id'],$list['wr_name'])?></span> on <span class='post-date'><?=date('m/d/Y', strtotime($list['wr_datetime']))?></span></span>
								<span class='post-mobile-comment-view'><a href="<?=$url?>"><span class='post-comment'><?=$list['wr_comment']?> Comment</span> <span class='post-divider'>|</span> <span class='post-views'><?=$list['wr_hit']?> view</span></span>
								</a>
							</div>
							
							<div class='desc'><a href="<?=$url ?>"><?php echo get_text(cut_str(strip_tags(str_replace('&nbsp;',"", $list[wr_content])), 65, '...' )) ?></a></div>
						</div>
					</div>
				</div>
			</li>
		
	<?php $i++;} ?>
	</ul>
	<div style='clear:both;'></div>
	</div>

</div>
<? }?>