<p>&nbsp;</p>

<div style="padding: 1em; line-height: 2em; font-size: 1.2em;">
	<div class='first-page-title'>Site 관리자 페이지입니다.</div>
	
	<a class='first-page-message' href="https://docs.google.com/a/withcenter.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank">
		처음이신가요? 사용자 설명서를 참고하십시오.
	</a>
	<br />
	<a class='first-page-button' style='color: #ffffff;' href="https://docs.google.com/a/withcenter.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank">
		사용자 설명서
	</a>
	
	<br />
	<a class='first-page-button' style='color: #ffffff;' href="<?=g::url()?>">
		메인 페이지
	</a>
	
	<br />
	<? if ( admin() ) { ?>
		<a class='first-page-button' style='color: #ffffff;' href="?module=admin&action=index">
			<?=ln("X ADMIN PAGE", "X 관자 페이지")?>
		</a>
	<?} ?>
	
</div>
