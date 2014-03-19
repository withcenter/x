<?php
	
	/** display 3 posts from each forum that is selected by the user on Config_Global */
	include_once 'blog_main.php';
	
	ob_start();
?>
		<td width=180>
			<? 
				for ( $i=1; $i <= 4; $i++ ) {
					if ( $i == 1 ) $add_class = "first-banner";
					else $add_class = null;
					
				if  ( file_exists( x::path_file('banner_'.$i) ) ) {
					$filename = x::url_file( "banner_{$i}" );
					if ( !$url = x::meta('banner_'.$i.'_url') ) $url = "javascript:void(0)";
					
				?>
				<div class='company-banner <?=$add_class?>'>
					<a href='<?=$url?>' target='_blank'><img src='<?=$filename?>' /></a>
				</div>
				<? }
					else {
						if ( $i >  3 ) continue;
					?>
						<div class='company-banner <?=$add_class?>'>
							<a href='javascript:void(0)'><img src='<?=x::url_theme()?>/img/default_side_banner.png' /></a>
						</div>
				<?}?>
			<?}?>
		</td>
<?php	
	$side_banner = ob_get_clean();
?>
<table class='main-bottom' cellpadding=0 cellspacing=0 width='100%'>
	<tr valign='top'>
		<? if (x::meta('theme_sidebar') =='right' ) {
			echo $side_banner; 
			echo "<td width=10></td>";
		}?>
		<td>
			<?php
			include_once 'latest_posts.php';
			/*
				$forum_exist = 0;
				for ( $i = 2; $i <= 10; $i++ ) {
					if ( x::meta('forum_no_'.$i) ) {
						$forum_exist = 1;
						
						$option = db::row( "SELECT bo_subject, bo_count_write FROM $g5[board_table] WHERE bo_table='".x::meta('forum_no_'.$i)."'" );
						echo latest( "x-latest-blog" , x::meta('forum_no_'.$i) , 3 , 25 );
					}
				}
				
				
				if ( !$forum_exist ) {
					echo latest( "x-latest-blog" , bo_table(1) , 3 , 25 );
				}
			*/?>
		</td>
		
		<? if (x::meta('theme_sidebar') !='right' ) {
			echo "<td width=10></td>";
			echo $side_banner; 
		}?>
	</tr>
</table>

	