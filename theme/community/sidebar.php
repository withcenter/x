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
		?>	
			<li>
				<a href='<?=$recent_url?>'>					
				<?
					echo "<div class='subject'>$recent_subject</div> <div class='post-content'>$recent_content</div> <div class='no-of-recent-comments'>($recent_comment_count)</div>";
				?>
				</a>
			</li>		
		<?}?>
		</ul>
	</div>
</div> <!--posts--recent-->

<div class='sidebar-banner'>
	<?if( ms::meta('combanner_sidebar_text1') ) echo "<div class='sidebar-banner-title'>".ms::meta('combanner_sidebar_text1')."</div>"; ?>
	<?if( ms::meta('combanner_sidebar') ) $sidebar_banner = ms::meta('img_url').ms::meta('combanner_sidebar');
	else $sidebar_banner = x::url_theme().'/img/community_sidebar_banner.png';?>
	<img src="<?=$sidebar_banner?>">
</div>

