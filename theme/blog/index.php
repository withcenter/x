<?php
	
	/** display 3 posts from each forum that is selected by the user on Config_Global */
	if ( ms::meta('forum_no_1') ) include_once 'blog_main.php';
	
	ob_start();
?>
		<td width=180>
			<div class='company-banner first-banner'>
				<a href='http://www.philgo.com' target='_blank'><img src='<?=x::url_theme()?>/img/company_banner.png' /></a>
			</div>
				
			<? 
				$banner_url = ms::meta('img_url');
				for ( $i=1; $i <= 4; $i++ ) {
				if  ( ms::meta('banner_'.$i) ) {
					$filename =  $banner_url.ms::meta('banner_'.$i );
				?>
				<div class='company-banner'>
					<a href='http://www.philgo.com' target='_blank'><img src='<?=$filename?>' /></a>
				</div>
				<? }
					else {
						if ( $i >  2 ) continue;
					?>
						<div class='company-banner'>
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
		<? if (ms::meta('theme_sidebar') =='right' ) {
			echo $side_banner; 
			echo "<td width=10></td>";
		}?>
		<td>
			<?php
				for ( $i = 2; $i <= 10; $i++ ) {
					if ( ms::meta('forum_no_'.$i) ) {
						$option = db::row( "SELECT bo_subject, bo_count_write FROM $g5[board_table] WHERE bo_table='".ms::meta('forum_no_'.$i)."'" );
						echo latest( "x-latest-blog" , ms::meta('forum_no_'.$i) , 3 , 25 );
					}
				}
			?>
		</td>
		
		<? if (ms::meta('theme_sidebar') !='right' ) {
			echo "<td width=10></td>";
			echo $side_banner; 
		}?>
	</tr>
</table>

	