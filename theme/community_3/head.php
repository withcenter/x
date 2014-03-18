<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/theme.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/head.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/tail.css' />
<script src='<?=x::url_theme()?>/js/visitor.js' /></script>



<?
	$theme_sidebar = x::meta('theme_sidebar');
	if ( empty($theme_sidebar) || $theme_sidebar == 'left') {
		$sidebar = "left";
		$content = "right";
	}
	else {
		$sidebar = "right";
		$content = "left";
	}
?>
<style>
	.layout .body-wrapper .main-content .sidebar {
		float: <?=$sidebar?>;
	}
	.layout .body-wrapper .main-content .content {
		float: <?=$content?>;
	}
</style>
	
<div class='layout'>
	<div class='top'><?include 'top.php'?></div>
	<div class='header'>

	<table cellpadding=0 cellspacing=0><tr valign='top'>
		<td width=400>
			<div id="comm3_logo">
				<a href="<?php echo G5_URL ?>">
				<?if( file_exists( path_logo() ) ) { ?>
					<img src="<?=url_logo()?>">
				<?} else {?>
					<img src='<?=x::url_theme()?>/img/banner.png'>
				<?}?>
				</a>
			</div>
		</td>
		<td>
			<fieldset id="search_field">
				<legend>사이트 내 전체검색</legend>
				<form name="comm3_search_form" method="get" action="<?=x::url()?>" onsubmit="return fsearchbox_submit(this);">
				<input type="hidden" name="module" value="post">
				<input type="hidden" name="action" value="search">
				<input type='hidden' name='search_subject' value=1 />
				<input type='hidden' name='search_content' value=1 />
				<? /*
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
				<label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
				*/?>
				<input type="text" name="key" id="comm3_search_text" maxlength="20" placeholder='검색어를 입력해 주세요.' autocomplete='off'><input type="submit" value='검색' id="comm3_search_submit">

				</form>
			</fieldset>
		</td>
		</tr>
	</table>
	</div><!--header-->

	<div class='main-menu'>	
			<?include x::theme('main-menu')?>
	</div>

	<div class='body-wrapper'>
		<div class='main-content'>
			<div class='sidebar'>	
				<? include x::theme('sidebar'); ?>
			</div>
			<div class='content'>
