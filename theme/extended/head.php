<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
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
<div class ='layout'>
	<div class='header'>
		<div class='inner'>
			<div class='logo-wrapper'>
				<div class='logo'><a href='<?=G5_URL?>'><img src='<?=x::url_theme()?>/img/logo.png'/></a></div>
				<div class='text-info tablet'>
					<span class='info call-us'>문의 070-7529-1749 /</span>
					<a href='<?=G5_BBS_URL?>/board.php?bo_table=qna' class='info text'>질문과 답변 /</a>
					<a href='<?=$log_href?>' class='info text'><?=$login_msg?> /</a>
					<a href='<?=$profile_msg_url?>' class='info text'><?=$profile_msg?></a>
					<?if ( admin() ){?>
						<a class='info text' href='<?=x::url_admin()?>'>/ X-ADMIN</a>
						<? if ( super_admin() ) {?>
							<a class='info text' href='<?=g::url()?>/adm'>/ ADMIN</a>
						<? }?>
						
					<?}?>
				</div>
			</div>
			<div class='right_main_menus above-400px'>
				<ul>
					<li><div class='extra-border'></div><a href='<?=G5_BBS_URL?>/write.php?bo_table=quotation'>사이트<br /> 제작의뢰</a></li>
					<li><div class='extra-border'></div><a href='<?=G5_BBS_URL?>/write.php?bo_table=quotation'>로고 배너<br /> 제작의뢰</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>사이트<br />갤러리</a></li>
					<li><div class='extra-border'></div><a href='<?=g::url()?>/?page=template_main'>템플릿<br />갤러리</a></li>							
				</ul>						
				<div style='clear:both;'></div>
			</div>
			<div style='clear:both;'></div>
			<div class='text-info web-browser'>
				<span class='info call-us'>문의 070-7529-1749 /</span>
				<a href='<?=G5_BBS_URL?>/board.php?bo_table=qna' class='info text'>질문과 답변 /</a>
				<a href='<?=$log_href?>' class='info text'><?=$login_msg?> /</a>
				<a href='<?=$profile_msg_url?>' class='info text'><?=$profile_msg?> </a>
				<?if ( admin() ){?>
					<a class='info text' href='<?=x::url_admin()?>'>/ X-ADMIN</a>
					<? if ( super_admin() ) {?>
						<a class='info text' href='<?=g::url()?>/adm'>/ ADMIN</a>
					<? }?>
				<?}?>
			</div>			
		</div>		
			<div class='right_main_menus below-400px'>
				<ul>
					<li><div class='extra-border'></div><a href='<?=G5_BBS_URL?>/write.php?bo_table=quotation'>사이트<br /> 제작의뢰</a></li>
					<li><div class='extra-border'></div><a href='<?=G5_BBS_URL?>/write.php?bo_table=quotation'>로고 배너<br /> 제작의뢰</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>사이트<br />갤러리</a></li>
					<li><div class='extra-border'></div><a href='j<?=g::url()?>/?page=template_main'>템플릿<br />갤러리</a></li>						
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
	<div class='container'>

	