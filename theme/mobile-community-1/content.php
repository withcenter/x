<div class='gallery'>
<?php
	echo latest( 'x-rwd-gallery', 'ms_test6_1', 40, 40, 1,
		array(
			'width'		=>300,
			'height'	=>180,
			'radius'	=> 2
		)
	);
?>
</div>

<?
	include 'forum_tab.php';
?>
<div class='latest-thumbnail'>
				<div class='left'><div class='inner'>
				<?
				$latest_bo_table = ms::board_id(etc::domain()).'_4';
				if ( g::forum_exist( $latest_bo_table ) ) {
					echo  latest("x-rwd-text-with-thumbnail", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
				}
				?>
				</div></div>
				<div class='right'><div class='inner'>
				<?
				$latest_bo_table = ms::board_id(etc::domain()).'_5';
				if ( g::forum_exist( $latest_bo_table ) ) {
					echo latest("x-rwd-text-with-thumbnail", $latest_bo_table, 4, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
				}
				?>
				</div></div>
				<div style='clar:both;'></div>
</div>
