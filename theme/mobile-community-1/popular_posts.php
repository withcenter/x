<div class='mobile-title-bar'>
	<img src='<?=x::url_theme()?>/img/popular-icon.png'/>인기글
</div>
<?
	$popular_posts_1 = g::posts(
		array(
			'domain'		=> etc::domain(),
			'wr_is_comment'	=> 0,
			'bo_table'		=> bo_table(1),
			'order by'		=> 'wr_hit DESC',
			'limit'			=> 3
		)
	);
	$popular_subject = db::result("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".bo_table(1)."'");
	foreach( $popular_posts_1 as $key => $value ) {
		$popular_posts_1[$key]['wr_content'] = db::result("SELECT wr_content FROM $g5[write_prefix]".$value['bo_table']." WHERE wr_id='".$value['wr_id']."'");
	}
		
?>
<div class='popular-posts-container'>
	<div class='posts-title'>
		<img src='<?=x::url_theme()?>/img/category-icon.png'/><?=$popular_subject?>
	</div>
	<?
	for ( $i = 0; $i <= 2 ; $i++ ) {
		echo "<div class='popular-posts'>";
			$imgsrc = get_list_thumbnail($popular_posts_1[$i]['bo_table'], $popular_posts_1[$i]['wr_id'], 210, 80); 
			if ( $imgsrc['src'] ) {
				$img = "<img src='$imgsrc[src]'/>";
			} else $img = '';
				$url = "bbs/board.php?bo_table=".$popular_posts_1[$i]['bo_table']."&wr_id=".$popular_posts_1[$i]['wr_id'];
			?>
			
				<table cellspacing='0' cellpadding='0' width='100%'>
					<tr valign='top'>
						<td  class='popular-image'><a href='<?=$url?>'><?=$img?></a></td>
					<td align='left'>
						<div class='popular-info'>
							<div class='popular-subject'><a href='<?=$url?>'><?=cut_str($popular_posts_1[$i]['wr_subject'],100,'...')?></a></div>
							<div class='popular-meta'>
								Posted by <?=get_sideview($popular_posts_1[$i]['mb_id'], $popular_posts_1[$i]['wr_name'])?>
								on <?=date('m/d/Y', strtotime($popular_posts_1[$i]['wr_datetime']))?> <span class='post-divider'>|</span>
								<?=$popular_posts_1[$i]['wr_comment']?> Comment <span class='post-divider'>|</span>
								<?=$popular_posts_1[$i]['wr_hit']?> view
							</div>
							<div class='popular-content'>
								<a href="<?=$url?>"><?php echo get_text(cut_str(strip_tags($popular_posts_1[$i]['wr_content']), 240, '...' )) ?></a>
							</div>
						</div>
					</td>
				</tr>
			</table>
			</div>
		<?
	}
	
	?>
</div>
	
<?
	$popular_posts_2 = g::posts(
		array(
			'domain'		=> etc::domain(),
			'wr_is_comment'	=> 0,
			'bo_table'		=> bo_table(2),
			'order by'		=> 'wr_hit DESC',
			'limit'			=> 3
		)
	);
	
	$popular_subject = db::result("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".bo_table(2)."'");
	foreach( $popular_posts_2 as $key => $value ) {
		$popular_posts_2[$key]['wr_content'] = db::result("SELECT wr_content FROM $g5[write_prefix]".$value['bo_table']." WHERE wr_id='".$value['wr_id']."'");
	}
?>
<div class='popular-posts-container'>
	<div class='posts-title'>
		<img src='<?=x::url_theme()?>/img/category-icon.png'/><?=$popular_subject?>
	</div>
	<?
	for ( $i = 0; $i <= 2 ; $i++ ) {
		echo "<div class='popular-posts'>";
			$imgsrc = get_list_thumbnail($popular_posts_2[$i]['bo_table'], $popular_posts_2[$i]['wr_id'], 210, 80); 
			if ( $imgsrc['src'] ) {
				$img = "<img src='$imgsrc[src]'/>";
			} else $img = '';
				$url = "bbs/board.php?bo_table=".$popular_posts_2[$i]['bo_table']."&wr_id=".$popular_posts_2[$i]['wr_id'];
			?>
			
			<table cellspacing='0' cellpadding='0' width='100%'>
				<tr valign='top'>
					<td class='popular-image'><a href='<?=$url?>'><?=$img?></a></td>
					<td>
						<div class='popular-info'>
							<div class='popular-subject'><a href='<?=$url?>'><?=cut_str($popular_posts_2[$i]['wr_subject'],20,'...')?></a></div>
							<div class='popular-meta'>
								Posted by <?=get_sideview($popular_posts_2[$i]['mb_id'], $popular_posts_2[$i]['wr_name'])?>
								on <?=date('m/d/Y', strtotime($popular_posts_2[$i]['wr_datetime']))?> <span class='post-divider'>|</span>
								<?=$popular_posts_2[$i]['wr_comment']?> Comment <span class='post-divider'>|</span>
								<?=$popular_posts_2[$i]['wr_hit']?> view
							</div>
							<div class='popular-content'>
								<a href="<?=$url?>"><?php echo get_text(cut_str(strip_tags($popular_posts_2[$i]['wr_content']), 240, '...' )) ?></a>
							</div>
						</div>
					</td>
				</tr>
			</table>
			</div>
		<?
	}
	
	?>
</div>

	
