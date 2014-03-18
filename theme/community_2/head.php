<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/theme.css' />
<script src='<?=x::url_theme()?>/js/theme.js' /></script>
<?php
	$path = x::theme('top');
	include $path;
	$image_dir = x::url_theme().'/img';
?>
<div class='logo_search'>
	<div class='inner'>
		<a href='<?=g::url()?>'>
			<?if( file_exists( path_logo() ) ) { ?>
					<img src="<?=url_logo()?>">
			<?} else {?>
				<img src="<?=x::url_theme()?>/img/banner.png" />	
			<?}?>
		</a>
		
		<div class='search-bar'>
			<form name="fsearchbox" method="get" action="<?=x::url()?>"  autocomplete='off'>
				<input type='hidden' name='module' value='post' />
				<input type='hidden' name='action' value='search' />
				<input type='hidden' name='search_subject' value=1 />
				<input type='hidden' name='search_content' value=1 />
				<div class='wrapper'><div class='s_inner'><div class='s_inner_inner'>
					<input type="text" name="key" id="sch_stx" maxlength="20" placeholder='검색어를 입력해 주세요.' value='<?=$in['key']?>' />
					<input type="image" src='<?=$image_dir?>/submit_button.png'>  
				</div></div></div>
            </form>
		</div>
		
		<div style='clear:right;'></div>
	</div>
</div>

<div class='main-menu'><div class='inner'>
	<?=x::menu_link()?>
</div></div>
<style>
.main-menu a[href*='<?=$bo_table?>'] {
	color: orange;
}
</style>

<div class='layout'>
	<div class='main-content'>
			<div class='left'>	
				<? include x::theme('left') ?>				
			</div><!--left-->
			<div class='content'>
				<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>