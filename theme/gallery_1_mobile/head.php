<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/header.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">
<link rel="stylesheet" href="<?=x::theme_url()?>/css/tail.css">
<script src='<?=x::url_theme()?>/js/theme.js' /></script>
<div class='layout'>
	<div class='header'>
		<div class='inner'>
			<table width='100%' cellpadding=0 cellspacing=0><tr valign='top'>
				<td width=210>
					<div id="gallery_1_logo">
						<a href="<?php echo G5_URL ?>">
						<?if( file_exists( path_logo() ) ) { ?>
							<img src="<?=url_logo()?>">
						<?} else {?>
							<img src='<?=x::url_theme()?>/img/logo.png'>
						<?}?>
						</a>
					</div>
				</td>
				<td>
					<div class='search_and_top_wrapper'>
						<div class='top'>
							<?include 'top.php'?>
						</div>
						<fieldset id="search_field">
							<legend>사이트 내 전체검색</legend>
							<form name="gallery_1_search_form_mobile" method="get" action="<?=x::url()?>" onsubmit="return fsearchbox_submit(this);">
							<input type="hidden" name="module" value="post">
							<input type="hidden" name="action" value="search">
							<input type='hidden' name='search_subject' value=1 />
							<input type='hidden' name='search_content' value=1 />
							<? /*
							<input type="hidden" name="sfl" value="wr_subject||wr_content">
							<input type="hidden" name="sop" value="and">
							<label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
							*/?>
							<table cellpadding=0 cellspacing=0 width='100%'>
							<tr>
								<td>									
									<input type="image" src='<?=x::url_theme()?>/img/search.png' id="gallery_1_search_submit_mobile">									
									<div class='login_icon_wrapper'>
										<img src='<?=x::url_theme()?>/img/login_icon.png' id="gallery_1_login_mobile">
									</div>
									<div style='clear:both;'></div>
								</td>
							</tr>					
							</table>							
												
						<!--[if lte IE 8]>
							<style>						
								#gallery_1_search_text_mobile {							
									line-height:41px;	
								}
							</style>
						<![endif]-->
					</div><!--/search_and_top_wrapper-->
				</td>
				</tr>
				<tr valign='top'>
					<td colspan=2>
						<div class='gallery_1_search_text_mobile_wrapper'>
							<div class='inner'>
								<div class='triangle-border'></div><div class='triangle'></div>
								<input type="text" name="key" id="gallery_1_search_text_mobile" maxlength="20" placeholder='검색어를 입력해 주세요.' autocomplete='off'>
							</div>
						</div>
					</td>
					</form>				
					</fieldset>	
				</tr>				
			</table>			
		</div>		
		<div class='gallery_mobile_outlogin_wrapper'>			
			<?=outlogin('x-outlogin-gallery-mobile');?>			
		</div>
		<div class='main-menu'>
			<?include_once('main-menu.php');?>
		</div>
	</div>
	
	<div class='body-wrapper'>		
		<div class='content'>