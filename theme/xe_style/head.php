<?php
	if (G5_IS_MOBILE) {
		include x::theme('mobile/head');
		return;
	}
?>
<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<!-- 상단 시작 { -->


<div id="xe-style-hd">
<?php
	include 'top.php';
	include 'logo_search.php';
	include x::theme('menu');
?>
</div>
<!-- } 상단 끝 -->
<?php
	ob_start();
?>
	<td width=270>
		<?php echo outlogin('basic'); // 외부 로그인  ?>

			<ul class='left-menu'>
				<li><a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank"><?=ln('X User Guide', 'X 이용 안내');?></a></li>

				<? if ( admin() ) { ?>
						<li><a href='<?=url_x_admin()?>'><?=ln('X Admin Page', 'X 관리자 페이지');?></a></li>
						<li><a href='<?=url_site_admin()?>'><?=ln('Site Admin Page', '사이트 관리자 페이지');?></a></li>
						<li><a href='<?=G5_URL?>/adm'><?=ln('G5 Admin Page', 'G5 관리자 페이지');?></a></li>
						<? } ?>
			</ul>
	</td>
<?php	
	$sidebar_content = ob_get_clean();
?>
<!-- 콘텐츠 시작 { -->
<div id="wrapper">
	<table cellpadding=0 cellspacing=0 border=1 width='100%'>
		<tr valign='top'>
		<?php
		if(x::meta('theme_sidebar') == 'left') {?>
			<?=$sidebar_content?>
			<td width=10></td>
		<?}?>
			<td>
				<div>
					<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>

	