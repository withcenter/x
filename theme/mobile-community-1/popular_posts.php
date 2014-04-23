<div class='mobile-title-bar'>
	<img style='position: relative; top: -2px;' src='<?=x::url_theme()?>/img/popular-icon.png'/>인기글
</div>
<?
$forum_exists = 0;
for ( $i=1; $i <=10; $i++ ) {
	$forum_name = x::meta('popular_forum_no_'.$i);
	$no_of_posts = x::meta('popular_no_of_posts_'.$i);
	if ( empty($no_of_posts) || ($no_of_posts == 0) ) $no_of_posts = 3;
	if ( $forum_name ) {
	echo mobile_popular_posts(	array(
										'domain'		=> etc::domain(),
										'wr_is_comment'	=> 0,
										'bo_table'		=> $forum_name,
										'order by'		=> 'wr_hit DESC',
								),
								array( 
									'icon'		 => x::url_theme().'/img/category-icon.png',
									'no_of_posts' => $no_of_posts,
								));
	$forum_exists = 1;
}}

if ( !$forum_exists ) {
	echo mobile_popular_posts(	array(
										'domain'		=> etc::domain(),
										'wr_is_comment'	=> 0,
										'bo_table'		=> bo_table(1),
										'order by'		=> 'wr_hit DESC',
								),
								array( 
									'icon'		 => x::url_theme().'/img/category-icon.png',
									'no_of_posts' => 3,
								));
}

function mobile_popular_posts($options, $meta) {
	global $g5;
	$popular_posts = g::posts($options);
	if($popular_posts == null) return;
	$popular_subject = db::result("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".$options['bo_table']."'");
	foreach( $popular_posts as $key => $value ) {
		$popular_posts[$key]['wr_content'] = db::result("SELECT wr_content FROM $g5[write_prefix]".$value['bo_table']." WHERE wr_id='".$value['wr_id']."'");
	}
		
?>
<div class='posts-title'>
	<img src='<?=$meta['icon']?>'/><?=$popular_subject?>
</div>
<div class='popular-posts-container'>
	<?
	$no_of_posts = count($popular_posts)-1;
	if ( $no_of_posts >= $meta['no_of_posts'] ) $no_of_posts = $meta['no_of_posts']-1;
	for ( $i = 0; $i <= $no_of_posts; $i++ ) {z
			?><div class='popular-posts <?if ( $i==$no_of_posts ) echo "last-popular-post";?>'> <?
			$imgsrc = x::post_thumbnail($popular_posts[$i]['bo_table'], $popular_posts[$i]['wr_id'], 210, 80); 
			if ( $imgsrc['src'] ) {
				$img = "<img src='$imgsrc[src]'/>";
			} elseif ( $image_from_tag = g::thumbnail_from_image_tag( $popular_posts[$i]['wr_content'],  $popular_posts[$i]['bo_table'], 210, 80 )) {
				$img = "<img class='img_left' src='$image_from_tag'/>";
			} else $img = "<img src='".x::url_theme()."/img/no_image.png'/>";
			$url = "bbs/board.php?bo_table=".$popular_posts[$i]['bo_table']."&wr_id=".$popular_posts[$i]['wr_id'];
			?>
			<table cellspacing='0' cellpadding='0' width='100%'>
				<tr valign='top'>
					<td  class='popular-image'><a href='<?=$url?>'><?=$img?></a></td>
				<td align='left'>
					<div class='popular-info'>
						<div class='popular-subject'><a href='<?=$url?>'><?=cut_str($popular_posts[$i]['wr_subject'],100,'...')?></a></div>
						<div class='popular-meta'>
							<b>글쓴이</b> <?=get_sideview($popular_posts[$i]['mb_id'], $popular_posts[$i]['wr_name'])?>
							<b>작성일</b> <?=date('m/d/Y', strtotime($popular_posts[$i]['wr_datetime']))?> <span class='post-divider'>|</span>
							<b>댓글</b> <?=$popular_posts[$i]['wr_comment']?> <span class='post-divider'>|</span>
							<b>조회수</b> <?=$popular_posts[$i]['wr_hit']?>
						</div>
						<div class='popular-content'>
							<a href="<?=$url?>"><?php echo get_text(cut_str(strip_tags($popular_posts[$i]['wr_content']), 240, '...' )) ?></a>
						</div>
					</div>
				</td>
			</tr>
		</table>
		</div>
	<?}?>
</div>
<?}?>
	

	
