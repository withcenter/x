<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<script src="<?=x::theme_url()?>/js/theme.js"></script>
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
						<?//="<li class='first-menu'>" . implode( "</li><li>", x::menu_links() ) . "</li>"?>
						<?$menu_list = x::menus();
						foreach( $menu_list as $menu){?>
							<li><a class='<?=$menu['url']?>' href='<?=G5_BBS_URL."/board.php?bo_table=".$menu['url']?>'><?=$menu['name']?></a></li>
						<?}?>
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
			</div><!--header-960px-->
		</div><!--inner-header-->
	</div><!--header-->
	<div class='categ_outer'>
		<?
		$menu_list = x::menus();
		foreach( $menu_list as $menu){					
			$categ = db::row("SELECT bo_category_list FROM ".$g5['board_table']." WHERE bo_table = '".$menu['url'] . "'");
			if( $categ['bo_category_list'] ){
			?>
			<div class='categ_wrapper' page = <?=$menu['url']?>>
				<div class='categ_title'>
					<a href='<?=G5_BBS_URL."/board.php?bo_table=".$menu['url']?>'><?=$menu['name']?></a>
				</div>
				<div class='categ_list'>								
					<div class='bar'></div>								
					<?
					$categories = explode( '|',$categ['bo_category_list'] );
					$total_categ = count( $categories );
					$categ_pages = ceil($total_categ/5);
					$count = 1;
					for( $i = 1; $i <= $categ_pages; $i++ ){
					?>
						<div style='width:10%; display:inline-block;vertical-align:top;'>
					<?
						for( $i2 = $i*5-5; $i2 < $i*5; $i2++ ){
						if( $i2 == $total_categ ) {											
							break;
						}
						?>									
							<div class='categ_item'><?=$categories[$i2]?></div>								
						<?
							$count++;
							}?>
						</div>
						<?}?>								
				</div>
			</div>
				<?
				}
			}
		?>
		<div class='bottom_item'>
			<div class='text'>I don't know what to put here...</div>
		</div>
	</div><!--categ_outer-->
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
			<li class='menu-title'>Mobile Menu<span class='dropdown-icon'><img src="<?=x::theme_url('img/arrow_down.png')?>" height=20 width=20 class='arrow_icon'></span></li>
			<?="<li class='sub'>" . implode( "</li><li class='sub'>", x::menu_links() ) . "</li>"?>
		</ul>
	</div>
	<div class='hidden-mobile-navigation'>
		<div class='close-mobile-navigation'><img src="<?=x::theme_url('img/close_hidden.png')?>"/></div>
		<div class='inner'>
			<div class='hidden-menu'>
				<ul class='hidden-mobile-menu'>
					<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links() ) . "</li>"?>
				</ul>
			</div>
			<div class='hidden-menu'>				
					<?				
					if( x::menu_links('top')[0] ){?>
					<ul class='hidden-top-menu'>
					<li class='first-menu'><?=implode( "</li><li>", x::menu_links('top') )?></li>
					</ul>		
					<?}?>
			</div>
		</div>
	</div>
	<div class='content'>
		<div class='inner-content'>

<!--CSS-->
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
	
	<? if ( $wr_id && $bo_table)  $selected_menu = "&wr_id=".$wr_id;
	else if ( $bo_table && empty($wr_id) ) $selected_menu = "bo_table=".$bo_table;
	else $selected_menu = null;
	?>
	.hidden-mobile-menu a[href*="<?=$selected_menu?>"] {
		color: #293848;
		font-size: 16px;
		border-bottom: 4px solid #0091dc;
		font-weight: 800;
	}

</style>
