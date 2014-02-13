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