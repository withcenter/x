<?=outlogin('x-outlogin-community') ?>	

<div class='company-banner'>
	<?if( ms::meta('companybanner_1') ) $company_banner = ms::meta('img_url').ms::meta('companybanner_1');
	else $company_banner = x::url_theme().'/img/community_company_banner.png';?>
	<img src="<?=$company_banner?>">
</div>

<?=latest( 'x-latest-community-comments' , ms::board_id(etc::domain()).'_1' , 5, 25)?>


<?
/** POSTS RECENT */
$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
$current_date = date('Y-m-d').' 23:59:59';
$previous_date = date('Y-m-d', strtotime("-7 day", strtotime($current_date))).' 00:00:00';
$recent_rows = db::rows( "SELECT bo_table, wr_id FROM $g5[board_new_table] WHERE $qb AND bn_datetime BETWEEN '$previous_date' AND '$current_date' AND wr_id=wr_parent ORDER BY bn_datetime DESC LIMIT 5" );	

if( $recent_rows ) {
	$i = 0;
	foreach ( $recent_rows as $recent_row ) {
		$recent_list[$i] = db::row( " SELECT * FROM $g5[write_prefix]".$recent_row['bo_table']." WHERE wr_id='".$recent_row['wr_id']."'" );
		$recent_list[$i]['bo_table'] =$recent_row['bo_table'];
		$i++;
	}
?>
<div class="posts-recent" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<div><img src="<?=x::url_theme()?>/img/recent-posts.png"></div>
						<div class='label'>RECENT POSTS</div>
					</td>
					<td align='right'>
						<div class='posts-more'><a href='#'>more <img src="<?=x::url_theme()?>/img/more-icon.png"></a></div>
					</td>
				</tr>
			</table>
		</div>
	<div class='posts-recent-items'>
		<ul>
		<?php
			
			foreach ( $recent_list as $recent_li ) {
				$recent_subject = $recent_li['wr_subject'];
				$recent_subject .= ":";
				$recent_content = cut_str($recent_li['wr_content'],30,'...');
				$recent_url = g::url().'/bbs/board.php?bo_table='.$recent_li['bo_table'].'&wr_id='.$recent_li['wr_id'];
				$recent_comment_count = $recent_li['wr_comment'];
				if ( $recent_comment_count == 0 ) $no_comment = 'no-comment';
				else $no_comment = '';
		?>	
			<li>
				<a href='<?=$recent_url?>'>					
				<?
					echo "<div class='subject'>$recent_subject</div> <div class='post-content'>$recent_content</div> <div class='no-of-recent-comments $no_comment'>($recent_comment_count)</div>";
				?>
				</a>
			</li>		
		<?}?>
		</ul>
	</div>
</div> <!--posts--recent-->
<? } else echo "<div class='notice'>MUST HAVE AT LEAST ONE POST FROM ANY FORUM</div>";?>


	
<?
/** RECENT COMMENTS */
$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
$recent_comments = db::rows( "SELECT bo_table, wr_id FROM $g5[board_new_table] WHERE $qb AND bn_datetime BETWEEN '$previous_date' AND '$current_date' AND wr_id!=wr_parent ORDER BY bn_datetime DESC LIMIT 5" );	

if( $recent_comments ) {
	$i = 0;
	foreach ( $recent_comments as $recent_comment ) {
		$comments_list[$i] = db::row( " SELECT * FROM $g5[write_prefix]". $recent_comment['bo_table']." WHERE wr_id='".$recent_comment['wr_id']."'" );
		$comments_list[$i]['bo_table'] = $recent_comment['bo_table'];
		$i++;
	}
?>

<div class="posts-recent" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<div><img src="<?=x::url_theme()?>/img/recent-posts.png"></div>
						<div class='label'>RECENT COMMENTS</div>
					</td>
					<td align='right'>
						<div class='posts-more'><a href='#'>more <img src="<?=x::url_theme()?>/img/more-icon.png"></a></div>
					</td>
				</tr>
			</table>
		</div>
	<div class='recent-comments-items'>

	<?php
		$i = 1;
		$no_of_comments = count($comments_list);
		foreach ( $comments_list as $comments_li ) {
			$comments_content = cut_str($comments_li['wr_content'],30,'...');
			$comments_url = g::url().'/bbs/board.php?bo_table='.$comments_li['bo_table'].'&wr_id='.$comments_li['wr_id'];
			$comments_author = $comments_li['mb_id'];

			$current_time = new DateTime(date('Y-m-d H:m:s'), new DateTimeZone('Europe/Berlin'));
			$old_time = new DateTime($comments_li['wr_datetime'], new DateTimeZone('Europe/Berlin'));

			$interval = date_diff($old_time,$current_time);
			if ( $interval->format('%y') > 0 )  $timeago = $interval->format('%yyrs');
			else if ( $interval->format('%m') > 0 ) $timeago = $interval->format('%mmo(s)');
			else if ( $interval->format('%d') > 0 ) $timeago = $interval->format('%day(s)');
			else if ( $interval->format('%h') > 0 ) $timeago = $interval->format('%hhr(s)');
			else if ( $interval->format('%i') == 0 ) $timeago = $interval->format('%ssec(s)');
			else if ( $interval->format('%i') > 0 ) $timeago = $interval->format('%imin(s)');
			
			
	?>	

		<a href='<?=$comments_url?>'>	
		<table <?if($i==$no_of_comments) echo "class='last-table'" ?> >
			<tr valign='top'>
				<td width='30px'>
					<img src='<?=x::url_theme()?>/img/comments-pic.png'>
				</td>
				<td>
					<div class='post-content'>
						<?=$comments_author?>: <?=$comments_content?>
						<span class='time-ago'>posted <?=$timeago?> ago</span>
					</div>
				</td>
			</tr>
		</table>
		</a>
		
		<?
			$i++;
		}?>

	</div>
</div> <!--posts--recent-->
<? } else echo "<div class='notice'>MUST HAVE AT LEAST ONE COMMENT FROM ANY FORUM POST</div>";?>

<div class='sidebar-banner'>
	<?if( !$sidebar_banner_title = ms::meta('combanner_sidebar_text1') ) $sidebar_banner_title = 'SIDEBAR BANNER TITLE' ?>
	<div class='sidebar-banner-title'><?=$sidebar_banner_title?></div>
	<?if( ms::meta('combanner_sidebar') ) $sidebar_banner = ms::meta('img_url').ms::meta('combanner_sidebar');
	else $sidebar_banner = x::url_theme().'/img/no-image-190w-160h.png';?>
	<img src="<?=$sidebar_banner?>">
</div>

