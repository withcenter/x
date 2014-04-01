<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/template_main.css' />
<script src="<?=x::theme_url()?>/js/theme.js"></script>
<?//echo member();?>
<?
		if( $member['mb_id'] ) {
			$login_msg = "로그아웃";			
			$log_href = G5_BBS_URL."/logout.php";			
			$profile_msg = "회원정보";
			$profile_msg_url = G5_BBS_URL."/member_confirm.php?url=register_form.php";
		}
		else {
			$login_msg = "로그인";
			$log_href = G5_BBS_URL."/login.php";			
			$profile_msg = "회원가입";
			$profile_msg_url = G5_BBS_URL."/register.php";			
		}
	?>
	<!--‘X’ 빌더 소개 질문과답변 자유게시판 다운로드 설치 사이트 -->
<div class ='layout'>
	<div class='header' style='background: url("<?=x::theme_url('img/bg_pattern.png')?>")'>
		<div class='inner'>
			<div class='login-signup'>
				<? if ( login() ) { ?><a href='<?=$profile_msg_url?>'><?=$member['mb_nick']?> 로그인</a> | <a href='<?=$log_href?>'>로그아웃</a><?}
				else {?><a href='<?=$log_href?>'>로그인</a> | <a href='<?=$profile_msg_url?>'>회원가입</a><?}?>
			</div>
			<div class='logo-wrapper'>
				<div class='logo'><a href='<?=G5_URL?>'><img src='<?=x::url_theme()?>/img/logo.png'/></a></div>
			</div>
			<div class='right_main_menus above-400px'>
				<ul>
					<li><a href='<?=g::url()?>/?page=intro'>X 빌더 소개 </a></li>
					<li><a href='<?=G5_BBS_URL?>/board.php?bo_table=ms_www_4'>자유게시판</a></li>
					<li><a href='<?=G5_BBS_URL?>/board.php?bo_table=ms_www_2'>질문과답변</a></li>
					<li><a href='<?=G5_BBS_URL?>/board.php?bo_table=ms_www_5'>다운로드</a></li>
					<li><a href='<?=g::url()?>/?page=template_main'>템플릿</a></li>	
				</ul>						
				<div style='clear:both;'></div>
			</div>
			<div style='clear:both;'></div>		
		</div>		
			<div class='right_main_menus below-400px'>
				<ul>
					<li><a href='<?=g::url()?>/?page=intro'>X 빌더 소개 </a></li>
					<li><a href='<?=G5_BBS_URL?>/board.php?bo_table=ms_www_2'>질문과답변</a></li>
					<li><a href='<?=G5_BBS_URL?>/board.php?bo_table=ms_www_4'>자유게시판</a></li>
					<li><a href='<?=G5_BBS_URL?>/board.php?bo_table=ms_www_5'>다운로드</a></li>
					<li><a href='<?=g::url()?>/?page=template_main'>템플릿</a></li>						
				</ul>						
				<div style='clear:both;'></div>
			</div>
			<div style='clear:both;'></div>
	</div>
	<!--[if lte IE 8]>
		<style>
			.header{
				min-width:970px;
			}
			.header .inner{
				width:970px;				
			}
			
			.header  .logo-wrapper{
				width:425px;				
			}
						
			.header .right_main_menus{
				width:545px
				float:left;
			}
			
			.header .right_main_menus ul li{	
				width:24%;
			}	

			.container{
				min-width:970px;
			}
			
			.footer-container{
				min-width:970px;
			}
		</style>
	<![endif]-->
	<div class='container_wrapper'>
		<div class='container'>
			<div class='call_us_bubble' style='background: url("<?=x::theme_url('img/call_us.png')?>")'>
				고객센터<br>070-7529-1749
			</div>
	
<script>
	$(function(){
		$(".right_main_menus a[href*='<?=$bo_table?>'], a[href*='<?=$in['page']?>']").css('border','solid 1px #49ac8d').css('background-color','#f3f7f7').css('color','#49ac8d');
	});
</script>
