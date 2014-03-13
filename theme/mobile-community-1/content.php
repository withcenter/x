

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
			echo  latest("x-rwd-text-with-thumbnail", $latest_bo_table, 15, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-rwd-text-with-thumbnail", $latest_bo_table, 15, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>

<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-latest-travel-lower-posts", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-latest-travel-lower-posts", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>

<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-travel_2_posts_with_image_right", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-travel_2_posts_with_image_right", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>


<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-travel_2_images_with_caption", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-travel_2_images_with_caption", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>

<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-latest-travel-2-posts", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-latest-travel-2-posts", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>

<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-latest-community-2", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-latest-community-2", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>

<div class='image-with-caption'>
	<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-community_3_images_with_caption", $latest_bo_table, 4, 20, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
	</div>
</div>

<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-community-3-timed-list", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-community-3-timed-list", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>


<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-community-3-timed-list-with-images", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-community-3-timed-list-with-images", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>

<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_1';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-latest-community3-posts", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo latest("x-latest-community3-posts", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/newspaper.png"));
		}
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>