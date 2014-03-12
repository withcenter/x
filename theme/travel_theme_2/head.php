<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/banner.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/index.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/tail.css' />
<script src='<?=x::url_theme()?>/js/floating-bar.js'></script>

<!-- 상단 시작 { -->
<?php
	include 'top.php';
?>
<div class="travel_theme2_header">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div class="header_wrapper">
			<div id="header-logo">
				<a href="<?php echo G5_URL ?>">
					<?if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
					else echo "<img src='".x::url_theme()."/img/default-logo.png'>";
					?>
				</a>
			</div>

	<div class='extra-menu-items'>
		<div class='extra-top'>
			<?for( $i = 1; $i <= 3; $i ++){			
				if( $i == 3 ) {?>
					<a class='no-border' href = '<?=g::url()?>?device=mobile'>모바일</a>
				<?}
				else {
				if ( x::meta('forum_no_'.$i ) ) {				
					  if ( x::meta('forum_no_'.$i.'_name') ) {
						$top_menu = x::meta('forum_no_'.$i.'_name');				
					  }
					  else {
						$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('forum_no_'.$i)."'");
						$top_menu = $row['bo_subject'];
					  }
					  ?>
						<a href = '<?=G5_BBS_URL?>/board.php?bo_table=<?=ms::meta('forum_no_'.$i)?>'>
							<?=cut_str($top_menu,10,'...')?>
						</a>													
				<?}?>
			<?}
			
			}?>
			<div style='clear:both'></div>
		</div>
		<div class='extra-bottom'>
			<?for( $i = 3; $i <= 6; $i ++){
				if( $i == 6 ) $no_border = 'no-border';
				else $no_border = null;				
				if ( x::meta('forum_no_'.$i ) ) {				
					  if ( x::meta('forum_no_'.$i.'_name') ) {
						$top_menu = x::meta('forum_no_'.$i.'_name');				
					  }
					  else {
						$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".x::meta('forum_no_'.$i)."'");
						$top_menu = $row['bo_subject'];
					  }
					  ?>
						<a class='<?=$no_border?> 'href = '<?=G5_BBS_URL?>/board.php?bo_table=<?=x::meta('forum_no_'.$i)?>'>
							<?=cut_str($top_menu,10,'...')?>
						</a>													
				<?}?>			
			<?}?>
			<div style='clear:both'></div>
		</div>
	</div>			
	
	<div style='clear:both;'></div>
    </div>
	<?php include 'menu.php';?>
	<div style='clear: both'>
    </div>


</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->


<div class="layout"><div class='inner'>

<div class='floating-bar'>
	<div class='float-image-wrapper'>
	<?
	for( $i = 1; $i <= 3; $i++ ){
		if ( file_exists( x::path_file( "travel_floating_banner$i" ) ) ) {
			$img = "<a href='".x::meta("travel_floating_banner{$i}_url")."' target='_blank'><img style='width:100%; height: 100%;' src='".x::url_file( "travel_floating_banner$i" )."'/></a>";	
		}
		else {
			if ( $i ==  1 ) $img = "<a href='javascript:void(0)'><img style='width: 100%; height: 100%;' src='".x::url_theme()."/img/agoda.gif'/></a>";
			else if ( $i ==  2 ) $img = "<a href='javascript:void(0)'><img style='width: 100%; height: 100%;' src='".x::url_theme()."/img/cebu.gif'/></a>";
			else if ( $i ==  3 ) $img = "<a href='javascript:void(0)'><img style='width: 100%; height: 100%;' src='".x::url_theme()."/img/crown.gif'/></a>";			
		}
		if( $i == 3 ) $no_margin = 'no-margin';
	?>
		<div class='float-image <?=$no_margin?>'><?=$img?></div>
<?}?>
	
	</div>
<div class='back-to-top'><img src='<?=x::url_theme()?>/img/up-arrow.png'/><br>TOP</div>
</div>
    <div class="left">
		<div class='login-sidebar'>
			<?php echo outlogin('x-outlogin-travel_3'); // 외부 로그인  ?>
		</div> 
		<?php include x::theme('sidebar_left') ?>
    </div>
    <div class="container">
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
