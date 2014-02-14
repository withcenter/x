<div class='success-fail-message'><div class='inner'>사이트 개설에 실패하였습니다.</div></div>

<? if ( $error_code == MS_EXIST ) { ?>
	<div class='success-fail-message'><div class='inner'>입력하신 <?=$domain?> 은 이미 존재합니다. 다른 도메인을 선택하십시오.</div></div>
<? } else { ?>


<? } ?>

<a class='button' href='javascript:history.go(-1);'>돌아가기</a>

