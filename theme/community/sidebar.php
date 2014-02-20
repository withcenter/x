<?=outlogin('x-outlogin-community') ?>	

<div class='company-banner'>
	<?if( ms::meta('companybanner_1') ) $company_banner = ms::meta('img_url').ms::meta('companybanner_1');
	else $company_banner = x::url_theme().'/img/community_company_banner.png';?>
	<img src="<?=$company_banner?>">
</div>

<?=latest( 'x-latest-community-comments' , ms::board_id(etc::domain()).'_1' , 5, 25)?>

<div class='recent-posts'>
	<?
		$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
		$current_date = date('Y-m-d').' 23:59:59';
		$previous_date = date('Y-m-d', strtotime("-7 day", strtotime($current_date))).' 00:00:00';
		$rows = db::rows( "SELECT bo_table, wr_id FROM $g5[board_new_table] WHERE $qb AND bn_datetime BETWEEN '$previous_date' AND '$current_date' AND wr_id=wr_parent ORDER BY bn_datetime DESC" );	
		
		foreach ( $rows as $row ) {
			$list[] = db::row( " SELECT * FROM $g5[write_prefix]".$row['bo_table']." WHERE wr_id='".$row['wr_id']."'" );
		}
	?>
<div class="posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<div><img src="<?=x::url_theme()?>/img/recent-posts.png"></div>
						<div class='label'>RECENT POSTS</div>
					</td>
					<td align='right'>
						<div class='posts-more'>more <img src="<?=x::url_theme()?>/img/more-icon.png"></div>
					</td>
				</tr>
			</table>
		</div>
	<div class='recent-posts-items'>
		<ul>
		<?php
			
			foreach ( $list as $li ) {
				$subject = $li['wr_subject'];
				$subject .= ":";
				$content = cut_str($li['wr_content'],50,'...');
				$url = $li['href'];
				$comment_count = $li['wr_comment'];
		?>	
			<li>
				<a href='<?=$url?>'>					
				<?
					echo "<div class='subject'>$subject</div> <div class='post-content'>$content</div> <div class='no-of-recent-comments'>($comment_count)</div>";
				?>
				</a>
			</li>		
		<?}?>
		</ul>
	</div>
</div>
</div>
<div class='sidebar-banner'>
	<?if( ms::meta('combanner_sidebar_text1') ) echo "<div class='sidebar-banner-title'>".ms::meta('combanner_sidebar_text1')."</div>"; ?>
	<?if( ms::meta('combanner_sidebar') ) $sidebar_banner = ms::meta('img_url').ms::meta('combanner_sidebar');
	else $sidebar_banner = x::url_theme().'/img/community_sidebar_banner.png';?>
	<img src="<?=$sidebar_banner?>">
</div>

