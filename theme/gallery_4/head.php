<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url('css/head.css')?>">
<link rel="stylesheet" href="<?=x::theme_url('css/banner.css')?>">
<link rel="stylesheet" href="<?=x::theme_url('css/theme.css')?>">
<link rel="stylesheet" href="<?=x::theme_url('css/content.css')?>">
<link rel="stylesheet" href="<?=x::theme_url('css/tail.css')?>">
<script src="<?=x::theme_url()?>/js/theme.js"></script>
<script src="<?=x::theme_url()?>/js/banner.js"></script>
<script src="<?=x::theme_url()?>/js/tail.js"></script>

<div class='layout'>
	<div class='mobile-menu-wrapper' style='z-index:-1'>
		<div class='mobile-menu'>
		
		</div>
	</div><!--mobile-menu-wrapper-->
	<div class = 'inner'>
	<div class='top-wrapper'>
		<div class='top'>
			<ul>
				<?="<li>" . implode( "</li><li>", x::menu_links('top') ) . "</li>"?>
				<? 
				if ( login() ) { 						
					if ( super_admin() ) {  ?>
						<li class='no-bg'><a href="<?=x::url_admin()?>">X ADMIN</a></li>
						<li><a href="<?php echo G5_ADMIN_URL ?>">ADMIN</a></li>
					<?}	else if ( admin() ) {?>
						<li><a href='<?=url_site_config()?>'>사이트 관리</a></li>
					<?}?>
					<li><b><a href='<?=G5_BBS_URL?>/logout.php'>로그아웃</a></b></li>
					<li><b><a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'>회원정보수정</a></b></li>
				<? } else { ?>
					<li><b><a href='<?=G5_BBS_URL?>/login.php'>로그인</a></b></li>
					<li><b><a href='<?=G5_BBS_URL?>/register.php'>회원가입</a></b></li>
				<? } ?>

				<li><a href='<?=url_language_setting()?>'>언어변경</a></li>
				<li class='last_item'><a href='<?=g::url()?>?device=mobile'>모바일</a></li>			
			</ul>
			<div style='clear: both'></div>
		</div><!--top-->
	</div><!--top-wrapper-->
	
	<div class='header-wrapper'>
		<div class='header'>
			<div class='mobile-menu-button'>
				<div class='inner'><img src="<?=x::theme_url('img/mobile_menu.png')?>"/></div>
			</div>
			<div class='logo'>
				<div class='inner'>
					<a href="<?=g::url()?>"/>
						<?if( file_exists( path_logo() ) ) { ?>
							<img src="<?=url_logo()?>">
						<?} else {?>
							<img src='<?=x::theme_url('img/header_logo_default.png')?>'/>
						<?}?>
					</a>
				</div>
			</div>
			<div class='main-menu'>
				<div class='inner'>
					<? 
						$main_menu = x::menus();
						$i = 1;
		
					?>
					<ul>
						<? foreach ( $main_menu as $menu ) { ?>
							<li>
								<a href="/bbs/board.php?bo_table=<?=$menu['url']?>"><img src="<?=x::theme_url('img/menu_'.$i++.'.png')?>"/></a>
								<a href="/bbs/board.php?bo_table=<?=$menu['url']?>"><?=$menu['name']?></a>
							</li>
						<? } ?>
					</ul>
					<div style='clear: left'></div>
				</div>
			</div>
			<div style='clear: left'></div>
		</div><!--header-->
	</div><!--header-wrapper-->

<div class='content-wrapper'>
<div class='content banner'>
<?include 'gallery4_banner.php'?>
</div>
	<div class='content'>