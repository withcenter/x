<div class='message'>사이트 개설에 실패하였습니다.</div>

<? if ( $error_code == MS_EXIST ) { ?>
	<div class='messageg'>입력하신 <?=$domain?> 은 이미 존재합니다. 다른 도메인을 선택하십시오.</div>
<? } else { ?>


<? } ?>

<a class='button' href='javascript:history.go(-1);'>돌아가기</a>

