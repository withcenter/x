<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/admin/admin.css' />
<?php
	include x::admin_menu();
?>
<div class='page'>
<div class='page-header'>사이트 관리자 페이지입니다.</div>


<p>&nbsp;</p>


<ul class='page-header-item'>
	<li><a href='http://extended.kr' target=_blank>X 홈페이지</a></li>
	<li><a href='<?=X_URL?>/?module=update&action=index' target=_blank>소스 공유 : 테마, 위젯, 모듈</a></li>
	<li>
		<a href='https://docs.google.com/a/withcenter.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub' target=_blank>사용 설명서</a>
		|
		<a href='https://docs.google.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/pub' target=_blank>개발자 설명서</a>
		|
		<a href='https://github.com/withcenter/x' target=_blank>소스 저장소</a>
	</li>
</ul>

<iframe id='x-news' src="<?=X_URL?>/x/?module=etc&action=x_news_submit">
</div>
