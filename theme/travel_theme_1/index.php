<script src='<?=x::url_theme()?>/js/banner_rotation.js'></script>
<div class='top-panel'>
	<div style='border: solid 1px #d9d9d9; padding: 1px'>
		<div class='banner'>
			<?
				for ( $i = 1 ; $i <= 5 ; $i++ ) {
					if( !ms::meta( 'travelbanner_'.$i ) ){
						continue;
					}
					echo "<div class='banner-image image_num_$i'>";
					echo "<img src='".ms::meta('img_url').ms::meta('travelbanner_'.$i)."'>";
					echo "<p class='banner-text'>".ms::meta('travelbanner_'.$i.'_text1')."</p>";
					echo "</div>";
				}
			?>
			<div class='banner-pagination'>
				<?
					$count = 0;
					for ( $i = 1 ; $i <= 5 ; $i++ ) {
					if( !ms::meta( 'travelbanner_'.$i ) ){
						continue;
					}
					$count++ ;
				?>
					<div class='pages' image_meta_num='<?=$i?>'><?=$count?></div>
				<?}?>
			</div>
		</div>
	</div>
	
	
	<div class='forum-list'>
		<div style='padding: 1em'>
		<div class='discussion-forum'>
			<h2><img src='<?=x::url_theme()?>/img/discussion-icon.png'> Discussion Forum </h2>
			<ul>
				<li><a href='#'>POST TITLE 1 HERE<br><p>Brief Detail about the post here.</p></a></li>
				<li><a href='#'>POST TITLE 2 HERE<br><p>Brief Detail about the post here.</p></a></li>
			</ul>
		</div>
		<div class='qna'>
			<h2><img src='<?=x::url_theme()?>/img/qna.png'> Q&As </h2>
			<ul>
				<li><a href='#'>QUESTION 1 HERE<br><p>Brief Detail about the answer here.</p></a></li>
				<li><a href='#'>QIESTION 2 HERE<br><p>Brief Detail about the answer here.</p></a></li>
			</ul>
		</div>
		<div class='travel-forum'>
			<h2><img src='<?=x::url_theme()?>/img/travel.png'> Travel Stories </h2>
			<ul>
				<li><a href='#'>TRAVEL STORY 1 HERE<br><p>Brief Detail about the post here.</p></a></li>
				<li><a href='#'>TRAVEL STORY 2 HERE<br><p>Brief Detail about the post here.</p></a></li>
			</ul>
		</div>
		</div>
	</div>
</div>

<div class='middle-panel'>
	<div class='travel-stories'>
		<h2>Travel Stories</h2>

	</div>
	<div class='photo-gallery'>
		<h2>Photo Gallery</h2>
		<div class='thumb-container'>
			<?php 
				$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";				
				//$current_date = date('Y-m-d');
				//$previous_date = strtotime("-7 day", strtotime($date));
				$rows = db::rows( "SELECT bo_table, wr_id FROM $g5[board_new_table] WHERE $qb AND bn_datetime ORDER BY bn_datetime DESC" );								
				
				foreach ( $rows as $row ) {	
					$board['bo_table'] = $row['bo_table'];
					$images[] = get_file($board['bo_table'],$row['wr_id']);
				}
				
				foreach ( $images as $image ) {
					foreach ( $image as $key => $value ) {
						if( $value['view'] ) echo "<div class='thumb'>$value[view]</div>";
					}
				}
				
			?>
		</div>
	</div>
</div>

<div class='bottom-panel'>
	<div class='travel-packages'>
		<h2> Best Travel Packages </h2>
		<?
			$subject = "This is subject";
			$content = "this is the content";
			for ( $i = 1; $i <= 5; $i++ ) {
				echo "<div class='travel-package'><img src='#' width=190px height=103px><p><span class='travel-title'>$subject</span><br>$content</p></div>";
			}
		?>
	</div>
</div>