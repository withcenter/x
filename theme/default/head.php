<?php
	if (G5_IS_MOBILE) {
		include x::theme('mobile/head');
		return;
	}
?>
<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
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
				<li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
				<?php } else {  ?>
				<li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/login.php"><b>로그인</b></a></li>
				<?php }  ?>
				<li><a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자 <?php echo connect(); // 현재 접속자수  ?></a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
				<li><a href='<?=x::url_setting()?>'><?=ln('Language Change', '언어 변경');?></a></li>
			</ul>
			<div style='clear:both'></div>
		</div>
	</div>
    <?include x::theme('menu')?>
</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->
<div class = "wrapper">
    <div class = "aside">
		
		
		<?php
			include widget( array( 'code' => 'login-default', 'name' => 'login-default' ) );
		?>

		<ul class='left-menu'>
			<li><a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank"><?=ln('X User Guide', 'X 이용 안내');?></a></li>

			<? if ( admin() ) { ?>
				<li><a href='<?=url_x_admin()?>'><?=ln('X Admin Page', 'X 관리자 페이지');?></a></li>
				<li><a href='<?=url_site_admin()?>'><?=ln('Site Admin Page', '사이트 관리자 페이지');?></a></li>
				<li><a href='<?=g::url()?>/adm'><?=ln('G5 Admin Page', 'G5 관리자 페이지');?></a></li>
			<? } ?>
		</ul>
		<?php
			include widget( array( 'code' => 'side-post-latest-3', 'name' => 'post-latest' ) );
			include widget( array( 'code' => 'side-post-comment-latest-3', 'name' => 'post-comment-latest' ) );
			for( $_count_widget = 1; $_count_widget <= 5; $_count_widget ++ ) {
				include widget( array( 'code' => "side-sample-$_count_widget", 'name' => 'none' ) );
			}
		?>
    </div>
    <div class = "container" class='data'>
		<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
