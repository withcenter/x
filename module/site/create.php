<?
	add_stylesheet("<link rel='stylesheet' type='text/css' href='".x::url()."/module/".$module."/site.css' />");
	if ( ! login() ) {
		/*
		echo "<div class='success-fail-message'><div class='inner'>이 페이지를 이용하시려면 로그인을 하셔야 합니다. ";
		echo "</div></div>
				<a class='button' href='".g::url()."/bbs/login.php"."'>로그인 페이지로 이동</a>
		";
		return;
		*/
		return jsGo( G5_BBS_URL . '/login.php' );
	}
?>

<div class='create-site'>
	<div class='wrapper'>
		<div class='main-title'><div class='inner'>원하시는 사이트 주소를 입력하세요.</div></div>
			<form action='?'>
				<input type='hidden' name='module' value='<?=$module?>'>
				<input type='hidden' name='action' value='create_submit'>
				<input type='hidden' name='theme' value='y' />
					<div><span class='item'>사이트 주소</span> http://<input type='text' name='sub_domain'>.<?=etc::base_domain()?></div>
					<div><span class='item'>사이트 제목</span> <input type='text' name='title'></div>
					<div>
						<span class='item'>사이트 종류</span>
						<select name='site-type'>
							<option value=''>사이트 종류 선택</option>
							<option value=''></option>
							<option value='travel'>여행</option>
							<option value='community'>커뮤니티</option>
							<option value='gallery1'>하숙집/회사/식당/범용1</option>
							<option value='gallery2'>하숙집/회사/식당/범용2</option>
							<option value='gallery3'>하숙집/회사/식당/범용3</option>
							<option value='blog'>블로그</option>
						</select>	
					</div>
					
					<input style='position: relative; top: -33px; cursor: pointer;' type='submit' value='생성'>
					<div style='clear:right;'></div>
			</form>
	</div>
	<div>
		<div class='title'>내 사이트 목록</div>
		<ul>
			<?php
				foreach ( sites( $member['mb_id'] ) as $site ) {
			 ?>
				<li>
					<a href="<?=site_url($site['domain'])?>">
						사이트 주소: <?=$site['domain']?><br>
						사이트 제목: <?=site_title($site['domain'])?>
					</a>
				</li>
			<? }?>
		</ul>
	</div>
</div>