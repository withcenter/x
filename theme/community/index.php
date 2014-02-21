<script src='<?=x::url_theme()?>/js/banner_rotation.js'></script>
<div class='top-panel'>
	<div style='border: solid 1px #0d98ba; padding: 1px; border-radius: 3px;'>
		<div class='banner'>
			<?
				$banner_url = ms::meta('img_url');
				for ( $i = 1, $no_image = 5; $i <= 5 ; $i++) {
					if( !$banner_image = ms::meta( 'combanner_'.$i ) ){
						$no_image = $no_image-1;
						continue;
					}
					echo "<a href='".ms::meta('combanner_'.$i.'_text3')."' target='_blank'><div class='banner-image image_num_$i'>";
					echo "<img src='".$banner_url.$banner_image."'>";
					echo "<p class='banner-text'><span class='banner-title'>".ms::meta('combanner_'.$i.'_text1')." |</span> <span class='banner-content'>".cut_str(strip_tags(ms::meta('combanner_'.$i.'_text2')),60,'...')."</span></p>";
					echo "<div class='banner-more'>MORE ></div>";
					echo "</div></a>";
				}
				if ( $no_image = 1 ) echo "<img src='".x::url_theme()."/img/no-image-750w-230h.png'>" ;
			?>
		</div>
	</div>
	<div class='top-posts'>
		<div class='top-posts-1'>
		<?php $latest_bo_table = ms::meta('forum_no_1');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts' , $latest_bo_table , 6, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 1 ON ADMIN PAGE</div>";
		?>
		</div>
		<div class='top-posts-2'>
		<?php $latest_bo_table = ms::meta('forum_no_2');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts' , $latest_bo_table , 6, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 2 ON ADMIN PAGE</div>";
		?>
		</div>
		<div class='top-posts-3'>
		<?php $latest_bo_table = ms::meta('forum_no_3');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts-images' , ms::board_id(etc::domain()).'_3' , 4, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 3 ON ADMIN PAGE</div>";
		?>
		</div>
	</div>
</div>

<div class='middle-panel'>
	<div class='middle-banner'>
		<?if( ms::meta('combanner_middle') ) $middle_banner = ms::meta('img_url').ms::meta('combanner_middle');
		 else $middle_banner = x::url_theme().'/img/no-image-750w-140h.png';?>
		 <img src='<?=$middle_banner?>'>
	</div>
	<div class='middle-posts'>
		<div class='middle-posts-1'>
		<?php $latest_bo_table = ms::meta('forum_no_4');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts' , $latest_bo_table , 6, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 4 ON ADMIN PAGE</div>";
		?>	
		</div>
		<div class='middle-posts-2'>
		<?php $latest_bo_table = ms::meta('forum_no_5');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts' , $latest_bo_table , 6, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 5 ON ADMIN PAGE</div>";
		?>
		</div>
		<div class='middle-posts-3'>
		<?php
			$latest_bo_table = ms::meta('forum_no_6');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts-images' , $latest_bo_table , 4, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 6 ON ADMIN PAGE</div>";
		?>
		</div>
	</div>
</div>

<div class='bottom-panel'>
	<div class='bottom-banner'>
		<?if( ms::meta('combanner_bottom') ) $bottom_banner = ms::meta('img_url').ms::meta('combanner_bottom');
		 else $bottom_banner = x::url_theme().'/img/no-image-750w-140h.png';?>
		 <img src='<?=$bottom_banner?>'>
	</div>
	<div class='bottom-posts'>
		<div class='bottom-posts-1'>
		<?php $latest_bo_table = ms::meta('forum_no_7');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts' , $latest_bo_table , 6, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 7 ON ADMIN PAGE</div>";
		?>
		</div>
		<div class='bottom-posts-2'>
		<?php $latest_bo_table = ms::meta('forum_no_8');
			if ( g::forum_exist($latest_bo_table ) ) echo latest( 'x-latest-community-posts' , $latest_bo_table , 6, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 8 ON ADMIN PAGE</div>";
		?>
		</div>
		<div class='bottom-posts-3'>
		<?php
			$latest_bo_table = ms::meta('forum_no_9');
			if ( g::forum_exist($latest_bo_table) ) echo latest( 'x-latest-community-posts-images' , $latest_bo_table , 4, 25);
			else echo "<div class='notice'>YOU MUST ADD FORUM NO. 9 ON ADMIN PAGE</div>";
		?>
		</div>
	</div>
</div>