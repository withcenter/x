<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<script src="<?=x::theme_url()?>/js/theme.js"></script>
<style>
	.header .menu-dropdown-button {
		background: url('<?=x::theme_url('img/menu_dropdown_button.gif')?>')
	}

	.header .top-search-button {
		background: url('<?=x::theme_url('img/top-search-icon.gif')?>')
	}
	
	.header-960px .main-menu li a:hover {
		background: url('<?=x::theme_url('img/main_menu_hover.png')?>') 100% no-repeat;
	}
	.top-menu-ul li, .footer-menu-ul li {
		background: url('<?=x::theme_url('img/menu-divider.gif')?>') no-repeat 0 3px;
	}
	@media only screen and (max-width: 1024px) and (min-width: 768px) {
		.header .top-menu {
			background: url('<?=x::theme_url('img/menu_dropdown.png')?>') no-repeat right 0;
		}
	}
	@media only screen and (max-width: 767px) {
		.header .top-search-button {
			background: url('<?=x::theme_url('img/mobile_search.gif')?>');
		}
	}
</style>
<div class='layout'>
	<div class='header'>
		<div class='inner-header'>
			<div class='header-960px'>
				<h1 class='logo'>
					<a href="<?php echo G5_URL ?>">
						<?if( file_exists( path_logo() ) ) { ?>
							<img src="<?=url_logo()?>">
						<?} else {?>
							<img src="<?=x::theme_url('img/default_logo.png')?>">
						<?}?>
					</a>
				</h1>
					<ul class='main-menu'>
						<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links() ) . "</li>"?>
					</ul>
			
				<div class='top-menu'>
					<ul class='top-menu-ul'>
						<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links('top') ) . "</li>"?>
					</ul>
				</div>
				<div class='top-search'>
					<a href="javascript: void(0)" class='menu-dropdown-button'></a>
					<a href="javascript: void(0)" class='top-search-button'></a>
				</div>
				<div style='clear: left'></div>
				<div class='mobile-menu-top'><a href="javascript: void(0)" class='mobile-menu-button'><img src="<?=x::theme_url('img/menu_dropdown.gif')?>" width=50 height=50/></a></div>
			</div>
		</div><!--inner-header-->
	</div><!--header-->
	<div class='search-container'>
		<div class='search-field'>
			<form name="fsearchbox" method="get" action="<?=x::url()?>" autocomplete='off'>
				<div class='search-wrapper'>
					<input type='hidden' name='module' value='post' />
					<input type='hidden' name='action' value='search' />
					<input type='hidden' name='search_subject' value=1 />
					<input type='hidden' name='search_content' value=1 />
					<span><input class='key' type='text' name='key' placeholder='input search'><input type="image" src='<?=x::url_theme()?>/img/search_icon.gif' class='submit'/></span>
				</div>
			</form>
			<img src="<?=x::theme_url('img/close_search.gif')?>" class='close-search'/>
		</div>
	</div>
	<div class='mobile-menu'>
		<ul class='mobile-main-menu'>
			<li class='menu-title'>Mobile Menu<span class='dropdown-icon'><img src="<?=x::theme_url('img/arrow_down.png')?>" height=20 width=20></span></li>
			<?="<li class='sub'>" . implode( "</li><li class='sub'>", x::menu_links() ) . "</li>"?>
		</ul>
	</div>
	<div class='content'>
		<div class='inner-content'>