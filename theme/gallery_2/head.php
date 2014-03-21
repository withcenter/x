<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<script src="<?=x::theme_url()?>/js/theme.js"></script>

<div class='header'>
	<table cellspacing='0' cellpadding='0' >
		<tr valign='top'>
			<td class='header-logo-td' align='right'>
				<div class='header-logo'>
					<a href="<?=g::url()?>"/>
						<?if( file_exists( path_logo() ) ) { ?>
							<img src="<?=url_logo()?>">
						<?} else {?>
							<img src='<?=x::theme_url('img/header_logo_default.png')?>'/>
						<?}?>
					</a>
				</div>
			</td>
			<td class='top-menu-td' align='left'>
				<div class='top-menu'>
					<ul>
						<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links() ) . "</li>"?>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td class='login-panel-td' align='right'>
				<div class='login-panel'>
					<div class='login-button'>
						<img src="<?=x::theme_url('img/top_icon1.png')?>"/>
						<p>로그인</p>
					</div>
					<?
						if ( login() ) $register_link = g::url()."/bbs/member_confirm.php?url=register_form.php";
						else $register_link = g::url()."/bbs/register.php";
					?>
					<div class='register-edit-button'>
						<a href='<?=$register_link?>'><img src="<?=x::theme_url('img/top_icon2.png')?>"/></a>
						<a href='<?=$register_link?>'><p>회원가입</p></a>
					</div>
					<!--<div class='statistics-button'>
						<img src="<?=x::theme_url('img/top_icon2.png')?>"/>
						<p>회원가입</p>
					</div>-->
					<div class='search-button'>
						<img src="<?=x::theme_url('img/top_icon3.png')?>"/>
						<p>검색</p>
					</div>
					<div class='login-container'>
						<div class='triangle'></div>
						<?=outlogin('x-outlogin-gallery-2')?>
					</div>
					<div class='statistics-container'>
						<div class='triangle'></div>
						<?=visit('x-visit-gallery-2')?>
					</div>
					<div class='search-container'>
						<div class='triangle'></div>
						<fieldset id="search_field">
						<legend>사이트 내 전체검색</legend>
							<form name="gallery_2_search_forum" method="get" action="<?=x::url()?>" onsubmit="return fsearchbox_submit(this);">
								<input type="hidden" name="module" value="post">
								<input type="hidden" name="action" value="search">
								<input type='hidden' name='search_subject' value=1 />
								<input type='hidden' name='search_content' value=1 />
								<input type="text" name="key" id="gallery_2_search_forum_text" maxlength="20" placeholder='검색어를 입력해 주세요.' autocomplete='off'>
							</form>
						</fieldset>
					</div>
				</div>
			</td>
			<td class='menu-panel-td' align='left'>
				<div class='menu-panel'>
					<ul>
						<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links('top') ) . "</li>"?>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</div><!--header-->
<?
	if ( empty($bo_table) ) $_bo_table = 'empty_bo_table';
	else $_bo_table = $bo_table;
	
?>
<style>
.top-menu ul a[href*="<?=$_bo_table?>"] {
	background: #3e665f;
	border-radius: 3px;
}

.menu-panel ul a[href*="<?=$_bo_table?>"] {
	border-bottom: solid 1px #ffffff;
}
</style>

<div class='layout'>
	<div class='sidebar'>
	
	</div>
	
	<div class='content'>
	
	
	