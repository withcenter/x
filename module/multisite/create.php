<?
	if ( ! login() ) return include login_first();
?>

<div class='create-site'>
	<div class='wrapper'>
		<div class='main-title'><div class='inner'>원하시는 사이트 주소를 입력하세요.</div></div>
			<form action='?'>
				<input type='hidden' name='module' value='multisite'>
				<input type='hidden' name='action' value='create_submit'>
					<div><span class='item'>사이트 주소</span> http://<input type='text' name='sub_domain'>.<?=etc::base_domain()?></div>
					<div><span class='item'>사이트 제목</span> <input type='text' name='title'></div>
					<div>
						<span class='item'>사이트 종류</span>
						<select name='site-type'>
							<option value=''>사이트 종류 선택</option>
							<option value=''></option>
							<option value='travel'>여행</option>
							<option value='community'>커뮤니티</option>
							<option value='shopping'>쇼핑</option>
							<option value='academy'>어학원</option>
							<option value='blog'>블로그</option>
						</select>	
					</div>
					
					<input type='submit' value='생성'>
					<div style='clear:right;'></div>
			</form>
	</div>
	<div>
		<div class='title'>내 사이트 목록</div>
		<ul>
			<?php
				foreach ( ms::my_site() as $site ) {
			 ?>
				<li><a href="<?=ms::url_site($site['domain'])?>">사이트 주소: <?=$site['domain']?><br>
				사이트 제목: <?=$site['title']?></a></li>
			<? }?>
		</ul>
	</div>
</div>