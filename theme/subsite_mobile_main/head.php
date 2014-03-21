<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<?
		if( $member['mb_id'] ) {
			$login_msg = "로그아웃";			
			$log_href = G5_BBS_URL."/logout.php";			
			$profile_msg = "회원정보";
			$profile_msg_url = G5_BBS_URL."/member_confirm.php?url=register_form.php";
		}
		else {
			$login_msg = "로그인";
			$log_href = "javascript:void(0)";
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
					<span class='info call-us'>Call us! 070-7529-1749 /</span>
					<a href='<?=G5_BBS_URL?>/board.php?bo_table=qna' class='info text'>질문과 답변 /</a>
					<a href='<?=$log_href?>' class='info text'><?=$login_msg?> /</a>
					<a href='<?=$profile_msg_url?>' class='info text'><?=$profile_msg?> /</a>
				</div>
			</div>
			<div class='right_main_menus above-400px'>
				<ul>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Site Quotation</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Logo Banner Quotation</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Site Gallery</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Template Gallery</a></li>							
				</ul>						
				<div style='clear:both;'></div>
			</div>
			<div style='clear:both;'></div>
			<div class='text-info web-browser'>
				<span class='info call-us'>Call us! 070-7529-1749 /</span>
				<a href='<?=G5_BBS_URL?>/board.php?bo_table=qna' class='info text'>질문과 답변 /</a>
				<a href='<?=$log_href?>' class='info text'><?=$login_msg?> /</a>
				<a href='<?=$profile_msg_url?>' class='info text'><?=$profile_msg?> /</a>
			</div>			
		</div>		
			<div class='right_main_menus below-400px'>
				<ul>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Site Quotation</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Logo Banner Quotation</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Site Gallery</a></li>
					<li><div class='extra-border'></div><a href='javascript:void(0)'>Template Gallery</a></li>							
				</ul>						
				<div style='clear:both;'></div>
			</div>
			<div style='clear:both;'></div>
	</div>
	
	<div class='container'>

	