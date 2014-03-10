<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<script src="<?=x::theme_url()?>/js/theme.js"></script>
<div id='header'>
	<div class='top'>
		<div class='logo'><a href='<?=g::url()?>'><img src="<?=x::theme_url('img/logo.png')?>"></a></div>
		<div class='search'><?include x::theme('search')?></div>
		<div style='clear:both;'></div>
	</div>
	<div class='top-below-500-px'>
		<div class='logo'><a href='<?=g::url()?>'><img src="<?=x::theme_url('img/logo-below-500-px.png')?>"></a></div>
	</div>
	
	<div class='mobile-menu'><div class='inner'><?include 'mobile-menu.php'?></div></div>
	<div class='menu'><div class='inner'><?include 'menu.php'?></div></div>
	<div class='submenu'><div class='inner'><?include 'submenu.php'?></div></div>
	
</div>

	
<div id="content">
	
    <div class="inner">
					<div id='data'>
					
					<div id="login-box">
					   <?php
								if ( ! login() ) {
									echo outlogin('basic'); // 외부 로그인
								}
						?>
					</div>
					<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
					