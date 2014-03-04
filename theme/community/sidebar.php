<?=outlogin('x-outlogin-community') ?>

<?if( ms::meta('companybanner_1') ) { ?>
	<div class='company-banner'>
			<img src="<?=ms::meta('img_url').ms::meta('companybanner_1')?>">
	</div>
<?} else echo "<a href='http://www.philgo.com' target='_blank'><img src='".x::url_theme()."/img/philgo_banner.gif' style='border:0;'/></a>";?>


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
					<img src="<?=x::url_theme()?>/img/recent-posts.png">
						<span class='label'>최근 등록글</span>
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
				$recent_content = cut_str(strip_tags($recent_li['wr_content']),30,'...');
				$recent_url = g::url().'/bbs/board.php?bo_table='.$recent_li['bo_table'].'&wr_id='.$recent_li['wr_id'];
				$recent_comment_count = $recent_li['wr_comment'];
				if ( $recent_comment_count == 0 ) $no_comment = 'no-comment';
				else $no_comment = '';
		?>	
			<li>				
				<?
					echo "<div class='post-content'><a href='$recent_url'>$recent_subject $recent_content <span class='no-of-recent-comments $no_comment'>($recent_comment_count)</span></a></div>";
				?>
			</li>		
		<?}?>
		</ul>
	</div>
</div> <!--posts--recent-->
<? } ?>


	
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
						<img src="<?=x::url_theme()?>/img/recent-posts.png">
						<span class='label'>최근 댓글</span>
					</td>
				</tr>
			</table>
		</div>

	<div class='recent-comments-items'>
	<?php
		$i = 1;
		$no_of_comments = count($comments_list);
		foreach ( $comments_list as $comments_li ) {
			$comments_content = cut_str(strip_tags($comments_li['wr_content']),30,'...');
			$comments_url = g::url().'/bbs/board.php?bo_table='.$comments_li['bo_table'].'&wr_id='.$comments_li['wr_id'];
			$comments_author = $comments_li['mb_id'];
			$timeago = getTimeDuration(strtotime($comments_li['wr_datetime']));	
	?>	
		<div  class='recent-items <?if($i==$no_of_comments) echo "last-item" ?>' >
			<a href='<?=$comments_url?>'>	
				<span class='post-content'>
						<?=$comments_author?>: <?=$comments_content?>
						<span class='time-ago'>작성일 <?=$timeago?></span>
				</span>
			</a>
		</div>
		<?
			$i++;
		}?>

	</div>
</div> <!--posts--recent-->
<? } ?>
 
<?
/** Recent Comments from Forum 1 */
$latest_bo_table = ms::meta('forum_no_1');
if ( g::forum_exist( $latest_bo_table ) ) {
$post_comments = db::rows("SELECT * FROM $g5[write_prefix]$latest_bo_table WHERE wr_is_comment=1 LIMIT 5" );
$board_title  = db::result("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='$latest_bo_table'");

if( $post_comments ) {
	?>
	<div class="posts-recent" >
			<div class='title'>
				<table width='100%'>
					<tr valign='top'>
						<td align='left' class='title-left'>
							<img src="<?=x::url_theme()?>/img/recent-posts.png">
							<span class='label'><?=$board_title?> 댓글</span>
						</td>
						<td align='right'>
							<div class='posts-more'><a href='<?g::url()?>/bbs/board.php?bo_table=<?=$latest_bo_table?>'>자세히<img src="<?=x::url_theme()?>/img/more-icon.png"></a></div>
						</td>
					</tr>
				</table>
			</div>
		<div class='recent-comments-items'>
			<ul>
		<?php
			$i = 1;
			$no_of_comments = count($post_comments);
			foreach ( $post_comments as $post_comment ) {
				$comment_content = cut_str(strip_tags($post_comment['wr_content']),30,'...');
				$comment_url = g::url().'/bbs/board.php?bo_table='.$latest_bo_table.'&wr_id='.$post_comment['wr_id'];
				$timeago = getTimeDuration(strtotime($post_comment['wr_datetime'])); ?>	
				<li <?if($i==$no_of_comments) echo "class='last-comment'" ?>>
					<a href='<?=$comment_url?>'>	
						<?=$comment_content?>
					</a>
				</li>
				<? $i++; }?>
			</ul>
		</div>
	</div>
<? }} ?><!--recent-comments-->

<div class='sidebar-banner'>
	<?if( !$sidebar_banner_title = ms::meta('combanner_sidebar_text1') ) $sidebar_banner_title = '배너 제목을 입력하세요'; ?>
		<div class='sidebar-banner-title'><?=$sidebar_banner_title?></div>
		<?if( ms::meta('combanner_sidebar') ) $sidebar_banner = ms::meta('img_url').ms::meta('combanner_sidebar');
		else $sidebar_banner = x::url_theme().'/img/no_image_banner3.png';?>
		<img src="<?=$sidebar_banner?>">
</div>


<?php
function getTimeDuration($unixTime) {
	$period    =   '';
	$secsago   =   time() - $unixTime;
	 
	if ( $secsago < 60 ){
		$period = $secsago == 1 ? '1 초'     : $secsago . ' 초전';
	} else if ($secsago < 3600) {
		$period    =   round($secsago/60);
		$period    =   $period == 1 ? '1 분' : $period . ' 분전';
	} else if ($secsago < 86400) {
		$period    =   round($secsago/3600);
		$period    =   $period == 1 ? '1 시'   : $period . ' 시간전';
	} else if ($secsago < 604800) {
		$period    =   round($secsago/86400);
		$period    =   $period == 1 ? '1 일'    : $period . ' 일전';
	} else if ($secsago < 2419200) {
		$period    =   round($secsago/604800);
		$period    =   $period == 1 ? '1 주'   : $period . ' 주전';
	} else if ($secsago < 29030400) {
		$period    =   round($secsago/2419200);
		$period    =   $period == 1 ? '1 달'   : $period . ' 달전';
	} else {
		$period    =   round($secsago/29030400);
		$period    =   $period == 1 ? '1 년'    : $period . ' 년전';
	}
	return $period;
}
