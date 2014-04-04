<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/tail.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/banner.css">
<script src="<?=x::theme_url()?>/js/theme.js"></script>


<div class='layout'>
	<div class='header-wrapper'>
		<div class='header'>
			<div class='logo'><a href="<?php echo G5_URL ?>"><img src="<?=x::theme_url('img/default_logo.png')?>"></a></div>		
			<div class='menu'>    
				<ul>
					<li><a href='javascript: void(0)'>회사소개</a></li>
					<li><a href='javascript: void(0)'>서비스</a></li>
					<li><a href='javascript: void(0)'>포트폴리오</a></li>
					<li><a href='javascript: void(0)'>제작견적의뢰</a></li>
					<li><a href='javascript: void(0)'>고객지원</a></li>
				</ul>
				<div style='clear: left'></div>
			</div>
			<div style='clear: left'></div>
		</div><!--header-->
	</div><!--header-wrapper-->

		
<script>
	$(function(){
		$(".menu a[href*='<?=$bo_table?>'], .menu a[href*='<?=$in['page']?>']").css('border-bottom','solid 3px #ff9900');
	});
</script>

<div class='content-wrapper'>
	<div class='content'>