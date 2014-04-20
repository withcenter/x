<?php
	$pu = parse_url( $source_link );
	$git_zip_host_url = "https://codeload.github.com";
	$url_download = "$git_zip_host_url$pu[path]/zip/master";
?>

<b><?=ln("Manual INSTALL", "수동설치")?></b><br>



<ol>
	<li><a href="<?=$url_download?>"><?=ln("Download ZIP file", "ZIP 파일 다운로드")?></a></li>
	<li>압축 해제</li>
	<li>'X' 의 <?=$type?> 폴더에 저장(또는 업로드)</li>
</ol>

<a href="https://docs.google.com/document/d/1B0amy6P1xdBbYIPIl58Btgnjq8jwO33NfAwGToj8wWY/pub#h.yll0w1g2jmcx" target="_blank">수동 설치에 대한 자세한 안내</a>

