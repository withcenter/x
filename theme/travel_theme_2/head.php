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
					<?if( ms::meta('header_logo') ) { ?>
						<img src="<?=ms::meta('img_url').ms::meta('header_logo')?>">
					<?} else {?>
						<img src='<?=x::url_theme()?>/img/default-logo.png'>
					<?}?>
					</a>
			</div>
	<?
		global $cfgs;
		$cfgs = ms::forums();
	?>
	<div class='extra-menu-items'>
		<div class='extra-top'>
			<?for( $i = 0; $i < 3; $i ++){
				if( $i == 2 ) $no_border = 'no-border';
				else $no_border = null;
			?>
				<a class='<?=$no_border?>' href = '<?=G5_BBS_URL?>/board.php?bo_table=<?=$cfgs[$i]['bo_table']?>'>
					<?=cut_str($cfgs[$i]['bo_subject'],10,'...')?>
				</a>
			<?}?>
			<div style='clear:both'></div>
		</div>
		<div class='extra-bottom'>
			<?for( $i = 3; $i < 7; $i ++){
				if( $i == 6 ) $no_border = 'no-border';
				else $no_border = null;
			?>
				<a class='<?=$no_border?>' href = '<?=G5_BBS_URL?>/board.php?bo_table=<?=$cfgs[$i]['bo_table']?>'>
					<?=cut_str($cfgs[$i]['bo_subject'],10,'...')?>
				</a>
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
		if ( ms::meta('travel2banner'.$i.'_floating') ) {
			$img = "<a href='".ms::meta('travel2banner'.$i.'_floating_text'.$i)."' target='_blank'><img style='width:100%; height: 100%;' src='".ms::meta('img_url').ms::meta('travel2banner'.$i.'_floating')."'/></a>";	
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
		<?if ( (preg_match('/^config/', $action)) || (preg_match('/^config_/', $action)) ) include ms::site_menu();?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
