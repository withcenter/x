<link rel="stylesheet" href="<?=x::theme_url()?>/css/theme.css">
<script src="<?=x::theme_url()?>/js/theme.js"></script>

<div class='header'>
	<table cellspacing='0' cellpadding='0' >
		<tr valign='top'>
			<td class='header-logo-td' align='right'>
				<div class='header-logo'>
					<a href="<?=g::url()?>"/><img src='<?=x::theme_url('img/header_logo_default.png')?>'/></a>
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
					<div class='statistics-button'>
						<img src="<?=x::theme_url('img/top_icon2.png')?>"/>
						<p>회원가입</p>
					</div>
					<div class='search-button'>
						<img src="<?=x::theme_url('img/top_icon3.png')?>"/>
						<p>검색</p>
					</div>
					<div style="clear: both;"></div>
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
	
	
	