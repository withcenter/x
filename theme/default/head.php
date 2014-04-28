<?php
	if (G5_IS_MOBILE) {
		include x::theme('mobile/head');
		return;
	}
?>
<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<link rel="stylesheet" href="<?=x::url_theme('css/sidebar.css')?>">
<link rel="stylesheet" href="<?=x::url_theme('css/tail.css')?>">
<!-- 상단 시작 { -->

<div id="header">
	<div class = "inner">
		<div class = 'logo_and_top_menu'>
			<div class="logo">
				<a href="<?=g::url()?>"><img src='<?=x::url_theme()?>/img/logo1.png'/></a>
			</div>

			<ul>
				<?php if ($is_member) {  ?>
				<?php if ($is_admin) {  ?>
				<li><a href="<?php echo url_x_admin() ?>"><b>X 관리자</b></a></li>
				<?php }  ?>
				<li><a href="<?=url_bbs()?>/member_confirm.php?url=<?=url_bbs()?>/register_form.php">정보수정</a></li>
				<li><a href="<?=url_bbs()?>/logout.php">로그아웃</a></li>
				<?php } else {  ?>
				<li><a href="<?=url_bbs()?>/register.php">회원가입</a></li>
				<li><a href="<?=url_bbs()?>/login.php"><b>로그인</b></a></li>
				<?php }  ?>
				<li><a href="<?=url_bbs()?>/qalist.php">1:1문의</a></li>
				<li><a href="<?=url_bbs()?>/current_connect.php">접속자 <?php echo connect(); // 현재 접속자수  ?></a></li>
				<li><a href="<?=url_bbs()?>/new.php">새글</a></li>
				<li><a href='<?=x::url_setting()?>'><?=ln('Language Change', '언어 변경');?></a></li>
			</ul>
			<div style='clear:both'></div>
		</div>
	</div>
    <?include x::theme('menu')?>
</div>
<!-- } 상단 끝 -->

<?if ( preg_match('/msie 7/i', $_SERVER['HTTP_USER_AGENT'] ) ) {?>
<style>
	#header > .inner .logo_and_top_menu ul li{
		display:inline;
	}
</style>
<?}?>

<hr>

<!-- 콘텐츠 시작 { -->
<div class = "wrapper">
<table cellpadding=0 cellspacing=0 width='100%'><tr valign='top'>
	<td class = 'aside_td'>
    <div class = "aside">
		<div class='sidebar_login'>
		<?php
			include widget( array( 'code' => 'login-default', 'name' => 'login-default' ) );
		?>
		</div>		
		<div class='sidebar_menu'>
			<? if ( !login() ) { ?>
				<div class='user_guide'>
					<a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank"><?=ln('X User Guide', 'X 이용 안내');?></a>
				</div>
			<? } else { ?>
			<? if ( admin() ) { ?>
				<div class='admin_panel <? if ( !super_admin() ) echo "site_admin" ?>'>
					<a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank"><?=ln('X User Guide', 'X 이용 안내');?></a>
					<? if ( super_admin() ) { ?><a href='<?=url_x_admin()?>'><?=ln('X Admin Page', 'X 관리자 페이지');?></a><? } ?>
					<a href='<?=url_site_admin()?>'><?=ln('Site Admin Page', '사이트 관리자 페이지');?></a>
					<? if ( super_admin() ) { ?><a href='<?=g::url()?>/adm'><?=ln('G5 Admin Page', 'G5 관리자 페이지');?></a><? } ?>
					<div style='clear: left'></div>
				</div>
			<? }
			}?>
		</div>
		<?php
			include widget( array( 'code' => 'side-post-latest-3', 'name' => 'post-latest' ) );
			include widget( array( 'code' => 'side-post-comment-latest-3', 'name' => 'post-comment-latest' ) );
			for( $_count_widget = 1; $_count_widget <= 5; $_count_widget ++ ) {
				include widget( array( 'code' => "side-sample-$_count_widget", 'name' => 'none' ) );
			}
		?>
    </div>
	<?/*FOR MOBILE LAYOUT*/?>
	<div class='container mobile_layout'>
		<div id='index_page'>
			<div class='top-header'>
				<div class = 'inner'>
					익스텐디드에 오신 것을 환영합니다.
				</div>
			</div>
			
			<div class='content'>
				<div class='item left'>
					<div class='note'>
						홈페이지 관리자 이십니까?</br>그렇다면,
					</div>
					<ul>
						<li class='first'> <a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank">사용 설명서를 먼저 읽어 보세요.</a></li>
						<li> <a href='<?=url_site_admin('', 'multi', 'config_theme')?>'>테마를 변경해 보세요.</a></li>
					</ul>
				</div>
				<div class='item right'>
					<div class='note'>
						개발자 이십니까?<br>그렇다면,
					</div>
					<ul>
						<li class='first'> <a href='https://docs.google.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/pub' target='_blank'>개발자 문서를 읽어 보세요.</a></li>
						<li> <a href='http://extended.kr' target='_blank'>X 홈페이지에서 정보를 얻으세요.</a></li>
					</ul>
				</div>
				<div style='clear:both'></div>
			</div>				
			
			<div class = 'site_create'>
				<?include 'site-create-form.php';?>	
			</div>	
			<div class = 'site_and_post_list'>
				<div class ='post_list'><?include 'post-list.php';?></div>
				<div class ='site_list'><?include 'site-list.php';?></div>		
			</div>
		</div>		
	</div>
	<?/*******/?>
	</td>
	<td class = 'container_td'>
    <div class = "container" class='data'>
		<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
