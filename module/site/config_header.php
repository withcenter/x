<?php
	if ( ! admin() ) {
		echo "You are not admin";
		exit;
	}
	global $action;
?>
<link rel='stylesheet' href='<?=module("$module.css")?>' />
<script src='<?=module("$module.js")?>'></script>
<style>
.config-header a[href*='<?=$action?>'] {
	background-color: #6e6e6e;
}
</style>
<ul class='config-header'>
<li><a href="?module=<?=$module?>&action=config_first_page">처음</a></li>
<li><a href="?module=<?=$module?>&action=config_global">일반설정</a></li>
<li><a href="?module=<?=$module?>&action=config_member">회원</a></li>
<li><a href="?module=<?=$module?>&action=config_menu">메뉴</a></li>
<li><a href="?module=<?=$module?>&action=config_forum">게시판</a></li>
<li><a href="?module=<?=$module?>&action=config_write">글쓰기</a></li>
<li><a href="?module=<?=$module?>&action=config_theme">테마</a></li>
<li><a href="?module=<?=$module?>&action=config_mobile_theme">모바일테마</a></li>
</ul>


