

<div class='gallery'>
<?php
	echo latest( 'x-rwd-gallery', ms::board_id(etc::domain()).'_1' , 40, 40, 1,
		array(
			'width'		=> 233,
			'height'	=> 188,
			'radius'	=> 0,
		)
	);
?>
</div>

<?
	include 'forum_tab.php';
?>
<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-rwd-text-with-thumbnail", $latest_bo_table, 4, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers_2.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-rwd-text-with-thumbnail", $latest_bo_table, 4, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/panel_2.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>
