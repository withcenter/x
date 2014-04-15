<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/mobile-menu.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<script src="<?=x::theme_url()?>/js/theme.js"></script>
<div id='header'>
	<div class='top'>
		<div class='logo'>
			<a href="<?php echo G5_URL ?>">
				<?if( file_exists( path_logo() ) ) { ?>
					<img src="<?=url_logo()?>">
				<?} else {?>
					<img src="<?=x::theme_url('img/logo2.png')?>">
				<?}?>
			</a>
		</div>
		<div class='contact_and_search'>
		<?
		if( x::meta('mobile_contact_num') ){
			$mobile_contact = x::meta('mobile_contact_num');
		}
		else{
			$mobile_contact = "(000) 000-00-00";
		}
		?>
			<div class='contact'>전화번호  <?=$mobile_contact?></div>
			<div class='search'><?include x::theme('search')?></div>				
		</div>
		<div style='clear:both;'></div>
	</div>
	<div class='top-below-640-px'>
		<div class='logo'>
			<a href="<?php echo G5_URL ?>">
				<?if( file_exists( path_logo() ) ) { ?>
					<img src="<?=url_logo()?>">
				<?} else {?>
					<img src="<?=x::theme_url('img/logo2.png')?>">
				<?}?>
			</a>
		</div>
		<div class='contact_and_search'>
			<div class='contact'>전화번호  <?=$mobile_contact?></div>
			<div class='search'><?include x::theme('search')?></div>
		</div>
		<div style='clear:both'></div>
	</div>
	<div class='top-below-500-px'>
		<div class='logo'>
			<a href="<?php echo G5_URL ?>">
				<?if( file_exists( path_logo() ) ) { ?>
					<img src="<?=url_logo()?>">
				<?} else {?>
					<img src="<?=x::theme_url('img/logo2.png')?>">
				<?}?>
			</a>
		</div>		
		<div class='top-buttons'>
			<div class='search-button'>
				<img src='<?=x::theme_url()?>/img/search-500px.png'/>
				<div class='triangle'></div>
			</div>
		</div>
		<div style='clear:both'></div>		
		<div class='search'>
			<form name="fsearchbox" method="get" action="<?=x::url()?>" autocomplete='off'>
				<input type='hidden' name='module' value='post' />
				<input type='hidden' name='action' value='search' />
				<input type='hidden' name='search_subject' value=1 />
				<input type='hidden' name='search_content' value=1 />
				<input class='key' type='text' name='key'><input class='submit' type='submit' value='검색' src='<?=x::url_theme()?>/img/search_icon.png'>
			</form>
		</div>		
	</div>
	
	
	<div class='mobile-menu'>
		<div class='inner'><?include 'mobile-menu.php'?></div>
		<div class='pop-up drop-down'><?include 'drop-down-menu.php'?></div>
		<?if( !$member['mb_id'] ) {
		//no need to show log in box when logged in
		?>
			<div class='pop-up pop-up-login'>
				<?=outlogin('x-outlogin-mobile-1-640px');?>
			</div>	
		<?}?>
	</div>
	<div class='menu'><div class='inner'><?include 'menu.php'?></div></div>
	<div class='submenu'><div class='inner'><?include 'submenu.php'?></div></div>

<script>
	if( $(".menu_item[page='<?=$in['page']?>'] a").length ) $(".menu_item[page='<?=$in['page']?>'] a").addClass('selected');
	//else if ( '<?=$_SERVER['REQUEST_URI']?>' == '/bbs/register.php')
</script>
</div>
<div id="content">
	
    <div class="inner">
					<div id='data'>
					
					<div id="login-box">
					   
					</div>
					<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
					